<?php

namespace Core\Routing\Exception;

use Core\Routing\Interfaces\IRoute;
use Psr\Http\Message\RequestInterface;

interface IRoutingException
{
    /**
     * Get route
     *
     * @return IRoute
     */
    public function getRoute() : IRoute;
}
