<?php

namespace Core\Routing\SimpleRouter;

use Core\Helpers\Url;
use Core\Request\Exception\MethodNotAllowedException;
use Core\Request\Exception\NotFoundException;
use Core\Routing\Interfaces\IMatcher;
use Core\Routing\Interfaces\IRoute;
use Core\Routing\Interfaces\IRouteCollection;
use Psr\Http\Message\RequestInterface;

class Matcher implements IMatcher
{
    protected IRouteCollection $routeCollection;

    public function match(RequestInterface $request) : IRoute
    {
        $routes = $this->routeCollection->getRoutes();

        $methodAllow = true;

        $matchRoute = false;

        foreach($routes as $route){

            $methodAllow = in_array($request->getMethod(), $route->methods());

            if(Url::compareUrl($route->path(), $request->getUri()->getPath()))
                $matchRoute = $route;

        }

        if($matchRoute && $methodAllow)
            return $matchRoute;

        if($matchRoute && !$methodAllow)
            throw new MethodNotAllowedException($request);

        if(!$matchRoute)
            throw new NotFoundException($request);
    }

    public function initCollection(IRouteCollection $collection)
    {
        $this->routeCollection = $collection;
    }
}
