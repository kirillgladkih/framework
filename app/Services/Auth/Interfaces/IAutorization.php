<?php

namespace App\Services\Auth\Interfaces;

interface IAutorization
{
    /**
     * Authorize
     *
     * @param int $id
     * @return void
     */
    public static function authorize(int $id): void;
}
