<?php

namespace Core\Middleware\Interfaces;

interface IMiddleware
{
    /**
     * Handle next
     *
     * @param mixed $handler
     * @throws IRequestException
     * @return mixed
     */
    public function handle(mixed $handler) : mixed;
}
