<?php

namespace App\Entities\Models\IBlock\Catalog;

use App\Entities\Models\IBlock\AProductModel;

class Trailer extends AProductModel
{
    public $basic;
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
        "BASIC" => "basic"
    ];
}
