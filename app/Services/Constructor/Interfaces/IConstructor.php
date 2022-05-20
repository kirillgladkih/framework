<?php

namespace App\Services\Constructor\Interfaces;

interface IConstructor
{
    /**
     * Get collection
     *
     * @return IConstructorCollection
     */
    public function collection(): IConstructorCollection;
    /**
     * Get sum
     *
     * @return float
     */
    public function sum(): float;
}
