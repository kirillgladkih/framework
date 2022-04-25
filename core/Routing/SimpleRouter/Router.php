<?php

namespace Core\Routing\SimpleRouter;

use Core\Request\Exception\MethodNotAllowedException;
use Core\Request\Exception\NotFoundException;
use Core\Routing\Interfaces\IMatcher;
use Core\Routing\Interfaces\IRoute;
use Core\Routing\Interfaces\IRouteCollection;
use Core\Routing\Interfaces\IRouter;
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
    public function addRoute(IRoute $route): void
    {
        $this->routeCollection->addRoute($route);
    }
    /**
     * Add get route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function get(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["GET"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add head route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function head(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["HEAD"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add post route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function post(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["POST"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add put route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function put(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["PUT"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add delete route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function delete(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["DELETE"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add option route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function options(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["OPTIONS"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Add patch route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function patch(string $path, mixed $handler, array $rules = []): void
    {
        $route = new Route($path, $handler, $rules, ["PATCH"]);

        $this->routeCollection->addRoute($route);
    }
    /**
     * Matching routes
     *
     * @param RequestInterface $request
     * @return IRoute
     */
    public function match(RequestInterface $request): IRoute
    {
        $routes = $this->routeCollection->getRoutes();

        foreach ($routes as $route) {

            $allowMethod = in_array($request->getMethod(), $route->methods());

            $match = $this->matcher->match($request, $route);

            if ($match && $allowMethod)
                return $route;
        }

        if (!$match)
            throw new NotFoundException($request);

        if ($match && !$allowMethod)
            throw new MethodNotAllowedException($request);
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
