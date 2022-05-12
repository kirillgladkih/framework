<?php

namespace Core\Resolver;

use Laminas\Diactoros\ServerRequest;

interface IResolver
{
    /**
     * Resolve action
     *
     * @param mixed $handler
     * @param ServerRequest $request
     * @throws \Core\Resolver\Exception\IResolverException
     * @return callable
     */
    public function resolve(mixed $handler, ServerRequest $request) : callable;
}
