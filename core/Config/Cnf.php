<?php

namespace Core\Config;

class Cnf
{
    public static function application(string $key): mixed
    {
        $config = include(__DIR__ . "/../../config/application.php");

        return $config[$key] ?? null;
    }

    public static function auth(string $key): mixed
    {
        $config = include(__DIR__ . "/../../config/auth.php");

        return $config[$key] ?? null;
    }
}
