<?php

namespace App\Middleware;

use App\Services\Auth\Providers\JwtAuthProvider;
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
         * ЕСЛИ ВСЕ ХОРОШО, ТО АВТОРИЗИРУЕМ ПОЛЬЗОВАТЕЛЯ и возвращаем $handler
         */
        $jwt = $this->request
            ->getHeader("jwt")[0] ?? "";

        $result = JwtAuthProvider::validate($jwt);

        if($jwt && $result){

            JwtAuthProvider::authorize($result->data->ID);

            return $handler;

        }


        throw new UnauthorizedException($this->request);
    }
}
