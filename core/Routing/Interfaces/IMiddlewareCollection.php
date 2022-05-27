<?php

namespace Core\Routing\Interfaces;

use Core\Middleware\Interface\IMiddleware;

interface IMiddlewareCollection
{
    /**
     * Set middleware colleciton
     *
     * @param string $name
     * @throws \Core\Middleware\Exception\IMiddlewareException
     * @return void
     */
    public function set(string $name) : void;
    /**
     * Get middleware
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name) : mixed;
    /**
     * Get all middleware in collection
     *
     * @return array
     */
    public function all() : array;
}
