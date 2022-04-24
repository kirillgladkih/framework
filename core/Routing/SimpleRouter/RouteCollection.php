<?php

namespace Core\Routing\SimpleRouter;

use Core\Routing\Interfaces\IRoute;
use Core\Routing\Interfaces\IRouteCollection;

class RouteCollection implements IRouteCollection
{
    /**
     * Routes
     *
     * @var array
     */
    protected array $routes = [];
    /**
     * Add route in collection
     *
     * @param IRoute $route
     * @return void
     */
    public function addRoute(IRoute $route): void
    {
        $this->routes[] = $route;
    }
    /**
     * Get routes
     *
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }
}
