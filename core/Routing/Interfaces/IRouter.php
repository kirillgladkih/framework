<?php

namespace Core\Routing\Interfaces;

use Psr\Http\Message\RequestInterface;

interface IRouter
{
    /**
     * Add route in collection
     *
     * @param IRoute $route
     * @return void
     */
    public function addRoute(IRoute $route) : void;
    /**
     * Add get route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function get(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Add head route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function head(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Add post route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function post(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Add put route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function put(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Add delete route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function delete(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Add option route in colletion
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function options(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Add patch route in collection
     *
     * @param string $path
     * @param mixed $handler
     * @param array $rules = []
     * @return void
     */
    public function patch(string $path, mixed $handler, array $rules = []) : void;
    /**
     * Matching in collection
     *
     * @param RequestInterface $request
     * @throws \Core\Request\Exception\IRequestExceptiion
     * @return IRoute
     */
    public function match(RequestInterface $request) : IRoute;
    /**
     * Init matcher class
     *
     * @param IMatcher $matcher
     * @return void
     */
    public function initMatcher(IMatcher $matcher);
    /**
     * Init colletion class
     *
     * @param IRouteCollection $collection
     * @return void
     */
    public function initCollection(IRouteCollection $collection);
}
