<?php

namespace App\Services\Auth\Interfaces;

interface IUser
{
    /**
     * Get login
     *
     * @return string
     */
    public function login(): string;
    /**
     * Get email
     *
     * @return string
     */
    public function email(): string;
    /**
     * Get user id
     *
     * @return integer
     */
    public function id(): int;
    /**
     * Auth user
     *
     * @return boolean
     */
    public function auth(): bool;
}
