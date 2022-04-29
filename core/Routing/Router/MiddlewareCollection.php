<?php

namespace Core\Routing\Router;

use Core\Middleware\Exception\NotFoundMIddlewareException;
use Core\Middleware\Interface\IMiddleware;
use Core\Routing\Interfaces\IMiddlewareCollection;

class MiddlewareCollection implements IMiddlewareCollection
{
    /**
     * Middleware collection
     *
     * @var IMiddleware[]
     */
    protected array $middlewares = [];
     /**
     * Set middleware colleciton
     *
     * @param string $name
     * @return void
     */
    public function set(string $name) : void
    {
        $middlewares = include(__DIR__ . "/../../../config/middlewares.php");

        if(!key_exists($name, $middlewares))
            throw new NotFoundMIddlewareException($name);

        $this->middlewares[$name] = $middlewares[$name];
    }
    /**
     * Get middleware
     *
     * @param string $name
     * @return IMiddleware|bool
     */
    public function get(string $name) : IMiddleware|bool
    {
        return $this->middlewares[$name] ?? false;
    }
    /**
     * Get all middleware in collection
     *
     * @return array
     */
    public function all() : array
    {
        return $this->middlewares;
    }
}
