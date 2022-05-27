<?php

namespace App\Services\Auth\Providers;

use App\Services\Auth\Interfaces\IUser;
use App\Services\Auth\Basic\Authentication;
use App\Services\Auth\Basic\User;
use App\Services\Auth\Interfaces\IAutorization;
use App\Services\Auth\Interfaces\IAuthentication;
use App\Services\Auth\Interfaces\IAuthProvider;
/**
 * Auth provider class
 */
abstract class AuthProvider
    implements
    IAutorization,
    IAuthentication,
    IAuthProvider
{
    /**
     * User
     *
     * @var IUser
     */
    protected static IUser $user;
    /**
     * Attempt
     *
     * @param string $login
     * @param string $password
     * @return boolean
     */
    public static function attempt(string $login, string $password): bool
    {
        return Authentication::attempt($login, $password);
    }
    /**
     * Authorize
     *
     * @param integer $id
     * @return void
     */
    public static function authorize(int $id): void
    {
        static::$user = new User($id);
    }
    /**
     * Get auth user
     *
     * @return IUser|boolean
     */
    public static function user(): IUser|bool
    {
        return static::$user ?? false;
    }
}
