<?php

namespace App\Services\Auth\Interfaces;

interface IAuthProvider
{
    /**
     * Get auth user
     *
     * @return IUser|bool
     */
    public static function user(): IUser|bool;
}
