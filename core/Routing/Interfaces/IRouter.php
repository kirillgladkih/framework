<?php

namespace Core\Routing\Interfaces;

use Psr\Http\Message\ServerRequestInterface;

interface IRouter
{
    /**
     * Matching in collection
     *
     * @param ServerRequestInterface $request
     * @throws \Core\Request\Exception\IRequestExceptiion
     * @return IRoute
     */
    public function match(ServerRequestInterface $request) : IRoute;
    /**
     * Load routes collection
     *
     * @param IRouteCollection $routeCollection
     * @return void
     */
    public function loadMap(IRouteCollection $routeCollection) : void;
}
