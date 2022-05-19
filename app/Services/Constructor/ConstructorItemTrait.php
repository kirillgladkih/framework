<?php

namespace App\Services\Constructor;

trait ConstructorItemTrait
{
    /**
     * Load item from array
     *
     * @param array $data
     * @return void
     */
    abstract protected function loadFromArray(array $data): void;
}
