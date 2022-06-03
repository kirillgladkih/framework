<?php

namespace Core\Routing\Router;

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
     * This route
     *
     * @var IRoute
     */
    protected IRoute $route;
    /**
     * Add get route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function get(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["GET"]);;

        $this->routes[] = $this->route;

        return clone $this;
    }
    /**
     * Add head route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function head(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["HEAD"]);

        $this->routes[] = $this->route;

        return $this;
    }
    /**
     * Add post route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function post(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["POST"]);

        $this->routes[] = $this->route;

        return clone $this;
    }
    /**
     * Add put route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function put(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["PUT"]);

        $this->routes[] = $this->route;

        return clone $this;
    }
    /**
     * Add delete route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function delete(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["DELETE"]);

        $this->routes[] = $this->route;

        return clone $this;
    }
    /**
     * Add option route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function options(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["OPTIONS"]);

        $this->routes[] = $this->route;

        return clone $this;
    }
    /**
     * Add patch route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function patch(string $pattern, mixed $handler): IRouteCollection
    {
        $this->route = new Route($pattern, $handler, ["PATCH"]);

        $this->routes[] = $this->route;

        return clone $this;
    }
    /**
     * Set middleware in route
     *
     * @param array $middlewares
     * @return IRouteCollection
     */
    public function middleware(array $middlewares) : IRouteCollection
    {
        $middlewareCollection = $this->route->getMiddlewareCollection();


        foreach ($middlewares as $middleware)
            $middlewareCollection->set($middleware);

        return clone $this;
    }
    /**
     * Set tokens in route
     *
     * @param array $tokens
     * @return IRouteCollection
     */
    public function tokens(array $tokens) : IRouteCollection
    {
        $this->route->setTokens($tokens);

        $this->routes[] = $this->route;

        return clone $this;
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
