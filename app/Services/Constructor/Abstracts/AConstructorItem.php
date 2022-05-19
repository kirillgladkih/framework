<?php

namespace App\Services\Constructor\Abstracts;

use App\Services\Catalog\ProductTrait;
use App\Services\Catalog\Interfaces\IProduct;
use App\Services\Constructor\ConstructorItemTrait;
use App\Services\Constructor\Interfaces\IConstructorItem;

abstract class AConstructorItem implements IProduct, IConstructorItem
{
    use ProductTrait, ConstructorItemTrait;

    /**
     * Get main
     *
     * @return boolean
     */
    public function main(): bool
    {
        return $this->main;
    }
    /**
     * Get checked
     *
     * @return boolean
     */
    public function checked(): bool
    {
        return $this->checked;
    }
    /**
     * Get basic
     *
     * @return boolean
     */
    public function basic(): bool
    {
        return $this->basic;
    }
    /**
     * Get to array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "basic" => $this->basic,
            "checked" => $this->checked,
            "main" => $this->main,
            "price" => $this->price,
            "currncy" => $this->currency
        ];
    }
    /**
     * Load from array
     *
     * @param array $data
     * @return void
     */
    abstract protected function loadFromArray(array $data): void;
}
