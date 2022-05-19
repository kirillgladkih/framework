<?php

namespace App\Services\Constructor\Interfaces;

interface IConstructorItem
{
    /**
     * This main product
     *
     * @return boolean
     */
    public function main(): bool;
    /**
     * Cheked this item
     *
     * @return boolean
     */
    public function checked(): bool;
    /**
     * This basic complectation item
     *
     * @return boolean
     */
    public function basic(): bool;
}
