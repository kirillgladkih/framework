<?php

namespace App\Services\Auth\Interfaces;

interface IAuthentication
{
    /**
     * Attempt login
     *
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public static function attempt(string $login, string $password): bool;
}
