<?php

namespace Core\Routing\Iterfaces;

interface IRouteCollection
{
    /**
     * Add route in colletion
     *
     * @param IRoute $route
     * @return void
     */
    public function addRoute(IRoute $route) : void;
    /**
     * Get routes
     *
     * @return array
     */
    public function getRoutes() : array;
}
