<?php

namespace Core\Routing\Router;

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
     * Routes
     *
     * @var Route[]
     */
    protected array $routes = [];
    /**
     * Mathcer
     *
     * @var IMatcher
     */
    protected IMatcher $matcher;
    /**
     * Init
     */
    public function __construct()
    {
        $this->matcher = new Matcher();
    }
    /**
     * Matching
     *
     * @param RequestInterface $request
     * @return IRoute
     */
    public function match(RequestInterface $request): IRoute
    {
        foreach ($this->routes as $route) {

            $allowMethod = in_array($request->getMethod(), $route->getMethods());

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
     * Load routes map
     *
     * @param IRouteCollection $routeCollection
     * @return void
     */
    public function loadMap(IRouteCollection $routeCollection): void
    {
        $this->routes = array_merge($this->routes, $routeCollection->getRoutes());
    }
}
