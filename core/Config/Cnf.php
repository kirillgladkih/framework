<?php

namespace Core\Config;

class Cnf
{
    public static function application(string $key): mixed
    {
        $config = include(__DIR__ . "/../../config/application.php");

        return $config[$key] ?? null;
    }
    public static function rules(string $key): mixed
    {
        $config = include(__DIR__ . "/../../config/validation.php");

        return $config["rules"][$key] ?? null;
    }
}
