<?php

namespace Core\Routing\Interfaces;

use Psr\Http\Message\RequestInterface;

interface IRouter
{
    /**
     * Matching in collection
     *
     * @param RequestInterface $request
     * @throws \Core\Request\Exception\IRequestExceptiion
     * @return IRoute
     */
    public function match(RequestInterface $request) : IRoute;
    /**
     * Load routes collection
     *
     * @param IRouteCollection $routeCollection
     * @return void
     */
    public function loadMap(IRouteCollection $routeCollection) : void;
}
