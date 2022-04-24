<?php

namespace Core\Routing\SimpleRouter;

use Core\Routing\Iterfaces\IMatcher;
use Core\Routing\Iterfaces\IRoute;
use Core\Routing\Iterfaces\IRouteCollection;
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
