<?php

namespace Core\Routing\Interfaces;

interface IRouteCollection
{
    /**
     * Add get route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function get(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Add head route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function head(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Add post route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function post(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Add put route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function put(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Add delete route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function delete(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Add option route in colletion
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function options(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Add patch route in collection
     *
     * @param string $pattern
     * @param mixed $handler
     * @return IRouteCollection
     */
    public function patch(string $pattern, mixed $handler): IRouteCollection;
    /**
     * Set middleware in route
     *
     * @param array $middleware
     * @return IRouteCollection
     */
    public function middleware(array $middleware) : IRouteCollection;
    /**
     * Set tokens in route
     *
     * @param array $tokens
     * @return IRouteCollection
     */
    public function tokens(array $tokens) : IRouteCollection;
    /**
     * Get routes
     *
     * @return array
     */
    public function getRoutes(): array;
}
