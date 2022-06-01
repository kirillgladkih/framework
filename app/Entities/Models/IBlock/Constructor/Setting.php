<?php

namespace App\Entities\Models\IBlock\Constructor;

use App\Entities\Models\IBlock\AConstructorModel;

class Setting extends AConstructorModel
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
    public function tableName(): string
    {
        return 15;
    }
}
