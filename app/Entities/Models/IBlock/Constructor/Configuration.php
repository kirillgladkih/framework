<?php

namespace App\Entities\Models\IBlock\Constructor;

use App\Entities\Models\IBlock\AConstructorModel;

class Configuration extends AConstructorModel
{
    /**
     * Product
     *
     * @var [type]
     */
    public $product;
     /**
     * Fields map
     *
     * @var array
     */
    protected static array $fieldsMap = [
        "ID" => "id"
    ];
    /**
     * Props map
     *
     * @var array
     */
    protected static array $propMap = [
        "ITEM" => "product",
    ];

}
