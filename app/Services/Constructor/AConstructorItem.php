<?php

namespace App\Services\Constructor;

use App\Services\Catalog\Interfaces\IProduct;
use App\Services\Catalog\ProductTrait;
use App\Services\Constructor\Interfaces\IConstructorItem;

abstract class AConstructorItem implements IProduct, IConstructorItem
{
    use ProductTrait;

    protected bool $check;

    public function __construct()
    {

    }

    public function check(): bool
    {
        return $this->check;
    }
}
