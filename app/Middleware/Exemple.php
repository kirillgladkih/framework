<?php

namespace App\Middleware;

use Core\Middleware\Middleware;

class Exemple extends Middleware
{
    public function handle(mixed $handler): mixed
    {
        return $handler;
    }
}
