<?php

namespace Core\Routing\Exception;

use Core\Routing\Interfaces\IRoute;

abstract class ARoutingException extends \LogicException implements IRoutingException
{
    protected IRoute $route;

    public function __construct(string $message = "", IRoute $route, \Throwable $previos = null)
    {
        $this->route = $route;

        parent::__construct($message, 500, $previos);
    }

    public function getRoute() : IRoute
    {
        return $this->route;
    }
}


