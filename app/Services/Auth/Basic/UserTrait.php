<?php

namespace App\Services\Auth\Basic;

trait UserTrait
{
    /**
     * User id
     *
     * @var integer
     */
    protected int $id;
    /**
     * User email
     *
     * @var string
     */
    protected string $email;
    /**
     * User login
     *
     * @var string
     */
    protected string $login;
    /**
     * Get user id
     *
     * @return integer
     */
    public function id(): int
    {
        return $this->id ?? 0;
    }
    /**
     * Get user email
     *
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }
    /**
     * Get user login
     *
     * @return string
     */
    public function login(): string
    {
        return $this->login;
    }
}
