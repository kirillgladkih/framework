<?php

namespace App\Middleware;

use App\Services\Auth\JWT\JWT as WebJwt;
use Core\Middleware\Middleware;
use Core\Request\Exception\UnauthorizedException;

/**
 * ВСЕ ПОСРЕДНИКИ ДОЛЖНЫ БЫТЬ СОЗДАНЫ С МЕТОДОМ handle
 * И НАСЛЕДОВАТЬ КЛАСС MIDDLEWARE
 */

class Jwt extends Middleware
{
    /**
     * Middleware
     *
     * @param mixed $handler
     * @return mixed
     */
    public function handle(mixed $handler): mixed
    {
        /**
         * В СЛУЧАЕ ЕСЛИ ЗАПРОС ЧЕМ ЛИБО НЕ УСТРАИВАЕТ КИДАЕМ ИСКЛЮЧЕНИЕ
         * ЕСЛИ ВСЕ ХОРОШО, ТО возвращаем $handler
         */
        $jwt = $this->request
            ->getHeader("jwt")[0] ?? "";

        if($jwt && WebJwt::validate($jwt))
            return $handler;

        throw new UnauthorizedException($this->request);
    }
}
