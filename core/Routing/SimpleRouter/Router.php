<?php

namespace Core\Routing\SimpleRouter;

use Core\Routing\Iterfaces\IMatcher;
use Core\Routing\Iterfaces\IRoute;
use Core\Routing\Iterfaces\IRouteCollection;
use Core\Routing\Iterfaces\IRouter;
use Psr\Http\Message\RequestInterface;

class Router implements IRouter
{
    /**
     * Route Collection
     *
     * @var IRouteCollection
     */
    protected IRouteCollection $routeCollection;
    /**
     * Matcher
     *
     * @var IMatcher
     */
    protected IMatcher $matcher;
    /**
     * Init
     */
    public function __construct()
    {
        $this->initCollection(new RouteCollection());
        $this->initMatcher(new Matcher());
    }
    /**
     * Add route in collection
     *
     * @param IRoute $route
     * @return void
     */
    public function addRoute(IRoute $route) : void
    {
        $this->routeCollection->addRoute($route);
    }
    /**
     * Add get route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function get(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["GET"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add head route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function head(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["HEAD"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add post route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function post(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["POST"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add put route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function put(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["PUT"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add delete route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function delete(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["DELETE"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add option route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function options(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["OPTIONS"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add patch route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules
     * @return void
     */
    public function patch(string $path, mixed $handler, array $rules) : void
    {
        $route = new Route($path, ["PATCH"], $handler, $rules);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Matching in collection
     *
     * @param RequestInterface $request
     * @return IRoute
     */
    public function match(RequestInterface $request) : IRoute
    {
        $route = $this->matcher->match($request);

        return $route;
    }
    /**
     * Init matcher class
     *
     * @param IMatcher $matcher
     * @return void
     */
    public function initMatcher(IMatcher $matcher)
    {
        $this->matcher = $matcher;
    }
    /**
     * Init colletion class
     *
     * @param IRouteCollection $collection
     * @return void
     */
    public function initCollection(IRouteCollection $collection)
    {
        $this->routeCollection = $collection;
    }
}
