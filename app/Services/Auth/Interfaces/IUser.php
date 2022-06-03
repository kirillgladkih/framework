<?php

namespace App\Services\Auth\Interfaces;

interface IUser
{
    /**
     * Get user id
     *
     * @return integer
     */
    public function id(): int;
    /**
     * Get user email
     *
     * @return string
     */
    public function email(): string;
    /**
     * Get user login
     *
     * @return string
     */
    public function login(): string;
}
