<?php

namespace App\Services\Auth;

trait UserTrait
{
     /**
     * Email
     *
     * @var string
     */
    protected string $email;
    /**
     * Login
     *
     * @var string
     */
    protected string $login;
    /**
     * Auth
     *
     * @var boolean
     */
    protected bool $auth;
    /**
     * Id
     *
     * @var integer
     */
    protected int $id;
    /**
     * Get id
     *
     * @return integer
     */
    public function id(): int
    {
        return $this->id;
    }
    /**
     * Auth this user
     *
     * @return boolean
     */
    public function auth(): bool
    {
        return $this->auth;
    }
    /**
     * Get login
     *
     * @return string
     */
    public function login(): string
    {
        return $this->login;
    }
    /**
     * Get email
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }
}
