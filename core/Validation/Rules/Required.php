<?php

namespace Core\Validation\Rules;

use Core\Validation\Interfaces\IRule;

class Required implements IRule
{
    public function check(mixed $value): bool
    {
        return !is_null($value);
    }

    public function message(): string
    {
        return "element not required";
    }
}
