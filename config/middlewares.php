<?php
/**
 * ЭТО КОНФИГ ПОСРЕДНИКОВ
 * КЛЮЧ УКАЗЫВАЕТСЯ В РОУТАХ
 */

use App\Middleware\Jwt;

return [
    "jwt-auth" => [
        Jwt::class
    ]
];
