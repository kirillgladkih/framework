<?php

namespace App\Entities\Models\IBlock\Constructor;

use App\Entities\Models\IBlock\AConstructorModel;

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
}
