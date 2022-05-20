<?php

namespace App\Services\Constructor\Interfaces;

interface IConstructorItem
{
    /**
     * Get chek
     *
     * @return void
     */
    public function check(): bool;
    /**
     * Get category
     *
     * @return string
     */
    public function category(): string;
}
