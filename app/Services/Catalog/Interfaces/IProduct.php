<?php

namespace App\Services\Catalog\Interfaces;

interface IProduct
{
    /**
     * Get id
     *
     * @return integer
     */
    public function id(): int;
    /**
     * Get base price
     *
     * @return float
     */
    public function basePrice(): float;
    /**
     * Get name
     *
     * @return string
     */
    public function name(): string;
    /**
     * Get currency
     *
     * @return string
     */
    public function currency(): string;
    /**
     * To array this product
     *
     * @return array
     */
    public function toArray(): array;
}
