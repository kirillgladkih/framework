<?php

namespace Core\Resolver;

interface IResolver
{
    /**
     * Resolve action
     *
     * @param mixed $handler
     * @throws \Core\Resolver\Exception\IResolverException
     * @return callable
     */
    public function resolve(mixed $handler) : callable;
}
