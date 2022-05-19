<?php

namespace App\Services\Catalog;

trait ProductTrait
{
    /**
     * base price
     *
     * @var float
     */
    protected float $basePrice;
    /**
     * name
     *
     * @var string
     */
    protected string $name;
    /**
     * currency
     *
     * @var string
     */
    protected string $currency;
    /**
     * id
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
     * Get base price
     *
     * @return float
     */
    public function basePrice(): float
    {
        return $this->basePrice;
    }
    /**
     * Get name
     *
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }
    /**
     * Get currency
     *
     * @return string
     */
    public function currency(): string
    {
        return $this->currency;
    }
}
