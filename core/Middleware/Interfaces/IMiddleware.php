<?php

namespace Core\Middleware\Interface;

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
