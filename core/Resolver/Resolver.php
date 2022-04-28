<?php

namespace Core\Resolver;

use Core\Resolver\Exception\ResolveException;

class Resolver implements IResolver
{
    public function resolve(mixed $handler): callable
    {
        if(is_array($handler))
            return [new $handler[0], $handler[1]];

        throw new ResolveException("method {$handler[1]} not exitst in {$handler[0]} class");
    }
}
