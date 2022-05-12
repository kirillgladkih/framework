<?php

namespace Core\Resolver;

use Core\Resolver\Exception\ResolveException;
use Laminas\Diactoros\ServerRequest;

class Resolver implements IResolver
{
    public function resolve(mixed $handler, ServerRequest $request): callable
    {
        if(is_array($handler))
            return [new $handler[0]($request), $handler[1]];

        throw new ResolveException("method {$handler[1]} not exitst in {$handler[0]} class");
    }
}
