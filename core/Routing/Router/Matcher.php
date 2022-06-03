<?php

namespace Core\Routing\Router;

use Core\Helpers\Url;
use Core\Routing\Interfaces\IMatcher;
use Core\Routing\Interfaces\IRoute;
use Psr\Http\Message\ServerRequestInterface;

class Matcher implements IMatcher
{
    public function match(ServerRequestInterface $request, IRoute $route) : IRoute|bool
    {
        $pattern = preg_replace_callback("/\{[a-zA-Z]+\}/", function ($mathces) use ($route) {

            $key = preg_replace("/\}|\{/", "", $mathces[0]);

            if (isset($route->getTokens()[$key])) {

                $replace = $route->getTokens()[$key];

                return "(?P<" . $key . ">" . $replace . ")" ?? "";

            } else {

                return $mathces[0];
            }
        }, $route->getPattern());

        $pattern = Url::cleanUrl($pattern);

        $requestUri = Url::cleanUrl($request->getUri()->getPath());

        $pattern = preg_replace("/\//", "\/", $pattern);

        if(preg_match("/^$pattern$/", $requestUri, $mathces)){

            $attributes = array_filter($mathces, "\is_string", ARRAY_FILTER_USE_KEY);

            foreach ($attributes as $key => $attribute)
                $route->getAttributeCollection()->set($key, $attribute);

            return $route;
        }

        return false;

    }
}
