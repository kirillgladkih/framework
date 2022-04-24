<?php

namespace Core\Routing\SimpleRouter;

use Core\Routing\Interfaces\IMatcher;
use Core\Routing\Interfaces\IRoute;
use Core\Routing\Interfaces\IRouteCollection;
use Psr\Http\Message\RequestInterface;

class Matcher implements IMatcher
{
    /**
     * Route collection
     *
     * @var IRouteCollection
     */
    protected IRouteCollection $routeCollection;

    public function match(RequestInterface $request) : IRoute
    {
        return new Route();
    }

    public function initCollection(IRouteCollection $collection)
    {
        $this->routeCollection = $collection;
    }
}
