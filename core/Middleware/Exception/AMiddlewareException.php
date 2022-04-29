<?php

namespace Core\Middleware\Exception;

abstract class AMiddlewareException extends \LogicException implements IMiddlewareException
{
    public function __construct(string $message = "", \Throwable $previos = null)
    {
        parent::__construct($message, 500, $previos);
    }
}


