<?php

namespace Core\Routing\Interfaces;

use Core\Middleware\Interface\IMiddleware;

interface IMiddlewareCollection
{
    /**
     * Set middleware colleciton
     *
     * @param string $name
     * @return void
     */
    public function set(string $name) : void;
    /**
     * Get middleware
     *
     * @param string $name
     * @return IMiddleware|bool
     */
    public function get(string $name) : IMiddleware|bool;
    /**
     * Get all middleware in collection
     *
     * @return array
     */
    public function all() : array;
}
