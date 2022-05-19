<?php

namespace App\Helpers;

class CatalogHelper
{
    public function __construct()
    {
        \CModule::IncludeModule("catalog");
    }

    public function getBasePrice(int $productId): array
    {
        $price = \CPrice::GetBasePrice($productId);

        return $price;
    }

    // public function getCurrency(): string
    // {
    // }
}
