<?php

namespace App\Entities\Models\IBlock\Constructor;

use App\Entities\Models\IBlock\AConstructorModel;

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
     * Undocumented variable
     *
     * @var [type]
     */
    public $id;
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
        "PRODUCT" => "product",
        "CONFIGURATION" => "configuration"
    ];
}
