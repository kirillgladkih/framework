<?php

namespace Core\Validation\Interfaces;

interface IRule
{
    /**
     * Check validation rule
     * @param mixed $value
     * @return boolean
     */
    public function check(mixed $value): bool;
    /**
     * Failed message string
     *
     * @return string
     */
    public function message(): string;
}
