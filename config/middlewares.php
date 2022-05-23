<?php
/**
 * ЭТО КОНФИГ ПОСРЕДНИКОВ
 * КЛЮЧ УКАЗЫВАЕТСЯ В РОУТАХ
 */
return [
    "test" => \App\Middleware\Exemple::class,
    "jwt" => \App\Middleware\Jwt::class
];
