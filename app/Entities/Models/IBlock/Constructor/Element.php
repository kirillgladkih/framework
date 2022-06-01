<?php

namespace App\Entities\Models\IBlock\Constructor;

use App\Entities\Models\IBlock\AConstructorModel;
use App\Entities\Models\IBlock\Catalog\Product;

class Element extends AConstructorModel
{
    /**
     * Product
     *
     * @var [type]
     */
    public $product;
    /**
     * Configuration
     *
     * @var array
     */
    public $configuration;
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
        "PRODUCT" => "product",
        "CONFIGURATION" => "configuration"
    ];
    /**
     * Get Iblock id
     *
     * @return integer
     */
    public function tableName(): string
    {
        return 16;
    }

    protected function relations(): array
    {
        return [
            "product" => Product::class,
            "configuration" => Configuration::class
        ];
    }
}
