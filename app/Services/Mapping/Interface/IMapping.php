<?php

namespace App\Services\Mapping\Interface;

interface IMapping
{
    /**
     * Get data
     *
     * @return mixed
     */
    public static function prepare(mixed $data): mixed;
}
