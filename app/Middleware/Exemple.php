<?php

namespace App\Middleware;

use Core\Middleware\Middleware;
use Core\Request\Exception\MethodNotAllowedException;
use Core\Request\Exception\NotFoundException;

class Exemple extends Middleware
{
    /**
     * Middleware
     *
     * @param mixed $handler
     * @return mixed
     */
    public function handle(mixed $handler): mixed
    {
        // throw new MethodNotAllowedException($this->request);

        return $handler;
    }
}
