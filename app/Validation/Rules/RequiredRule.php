<?php

namespace App\Validation\Rules;

use Core\Validation\Interfaces\IRule;
use Psr\Http\Message\ServerRequestInterface;

class RequiredRule implements IRule
{
    /**
     * Check
     *
     * @param mixed $value
     * @return boolean
     */
    public static function check(mixed $value) : bool
    {
        return $value === null ? false : true;
    }
    /**
     * Get failed message
     *
     * @return string
     */
    public static function message(): string
    {
        return "not found";
    }
}
