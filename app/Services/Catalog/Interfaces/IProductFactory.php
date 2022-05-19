<?php

namespace App\Services\Catalog\Interfaces;

interface IProductFactory
{
    public static function createFromIb(int $elementId): IProduct;
}
