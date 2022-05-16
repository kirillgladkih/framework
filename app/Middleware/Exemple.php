<?php

namespace App\Middleware;

use Core\Middleware\Middleware;
use Core\Request\Exception\MethodNotAllowedException;
use Core\Request\Exception\NotFoundException;

/**
 * ВСЕ ПОСРЕДНИКИ ДОЛЖНЫ БЫТЬ СОЗДАНЫ С МЕТОДОМ handle
 * И НАСЛЕДОВАТЬ КЛАСС MIDDLEWARE
 */

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
        /**
         * В СЛУЧАЕ ЕСЛИ ЗАПРОС ЧЕМ ЛИБО НЕ УСТРАИВАЕТ КИДАЕМ ИСКЛЮЧЕНИЕ
         * ЕСЛИ ВСЕ ХОРОШО, ТО возвращаем $handler
         */

        // throw new MethodNotAllowedException($this->request);

        return $handler;
    }
}
