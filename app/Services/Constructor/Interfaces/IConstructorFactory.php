<?php

namespace App\Services\Constructor\Interfaces;

interface IConstructorFactory
{
    /**
     * Get seesion constructor
     *
     * @param integer $productId
     * @return IConstructor
     */
    public static function session(int $productId): IConstructor;
}
