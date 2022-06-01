<?php

namespace App\Entities\Models\IBlock\Constructor;

use App\Entities\Models\IBlock\AConstructorModel;
use App\Entities\Models\IBlock\Catalog\Product;

class Configuration extends AConstructorModel
{
    public $products;
     /**
     * Fields map
     *
     * @var array
     */
    protected static array $fieldsMap = [];
    /**
     * Props map
     *
     * @var array
     */
    protected static array $propMap = [
        "PRODUCTS" => "products"
    ];
    /**
     * Get Iblock id
     *
     * @return integer
     */
    public function tableName(): string
    {
        return 15;
    }
    /**
     * Relations
     *
     * @return array
     */
    protected function relations(): array
    {
        return [
            "products" => Product::class
        ];
    }
}
