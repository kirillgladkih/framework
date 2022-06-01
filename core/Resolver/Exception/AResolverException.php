<?php

namespace Core\Resolver\Exception;

abstract class AResolverException extends \LogicException implements IResolverException
{
    protected mixed $handler;

    public function __construct(mixed $handler, string $message = "", int $code = 500, \Throwable $previos = null)
    {
        $this->handler = $handler;

        parent::__construct($message, $code, $previos);
    }

    public function getHandler() : mixed
    {
        return $this->handler;
    }
}
