<?php

namespace App\Entities\Models\IBlock\Catalog;

use App\Entities\Models\IBlock\AProductModel;

class Suspension extends AProductModel
{
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
    protected static array $propMap = [];
    /**
     * Get Iblock id
     *
     * @return integer
     */
    public static function tableName(): string
    {
        return 22;
    }
}
