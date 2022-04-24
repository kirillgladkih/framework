<?php

namespace Core\Routing\Interfaces;

use Laminas\Diactoros\ServerRequest;
use Psr\Http\Message\RequestInterface;

interface IMatcher
{
    /**
     * Routes matching
     *
     * @param RequestInterface $request
     * @return IRoute
     */
    public function match(RequestInterface $request) : IRoute;
     /**
     * Init colletion class
     *
     * @param IRouteCollection $collection
     * @return void
     */
    public function initCollection(IRouteCollection $collection);
}
