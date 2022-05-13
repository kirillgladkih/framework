<?php

namespace Core\Routing\Router;

use Core\Request\Exception\MethodNotAllowedException;
use Core\Request\Exception\NotFoundException;
use Core\Routing\Interfaces\IMatcher;
use Core\Routing\Interfaces\IRoute;
use Core\Routing\Interfaces\IRouteCollection;
use Core\Routing\Interfaces\IRouter;
use Psr\Http\Message\ServerRequestInterface;

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
     * @param ServerRequestInterface $request
     * @return IRoute
     */
    public function match(ServerRequestInterface $request): IRoute
    {
        $matches = [];
        /**
         * Url match
         */
        foreach ($this->routes as $route)
            if($this->matcher->match($request, $route))
                $matches[] = $route;
        /**
         * Method match
         */
        foreach ($matches as $match)
            if(in_array($request->getMethod(), $match->getMethods()))
                return $match;

        if (empty($matches))
            throw new NotFoundException($request);

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
