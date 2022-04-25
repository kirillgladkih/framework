<?php

namespace Core\Routing\SimpleRouter;

use Core\Helpers\Url;
use Core\Routing\Interfaces\IMatcher;
use Core\Routing\Interfaces\IRoute;
use Psr\Http\Message\RequestInterface;

class Matcher implements IMatcher
{
    public function match(RequestInterface $request, IRoute $route) : IRoute|bool
    {
        $pattern = preg_replace_callback("/\{[a-zA-Z]+\}/", function ($mathces) use ($route) {

            $key = preg_replace("/\}|\{/", "", $mathces[0]);

            if (isset($route->rules()[$key])) {

                $replace = $route->rules()[$key];

                return "(?P<" . $key . ">" . $replace . ")" ?? "";

            } else {

                return $mathces[0];
            }
        }, $route->path());

        $pattern = Url::cleanUrl($pattern);

        $requestUri = Url::cleanUrl($request->getUri()->getPath());

        if(preg_match("#^$pattern$#", $requestUri, $mathces)){

            $attributes = array_filter($mathces, "\is_string", ARRAY_FILTER_USE_KEY);

            foreach ($attributes as $key => $attribute)
                $route->attributes()->set($key, $attribute);

            return $route;
        }

        return false;

    }
}
