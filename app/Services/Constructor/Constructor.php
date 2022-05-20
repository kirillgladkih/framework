<?php

namespace App\Services\Constructor;

use App\Services\Constructor\Interfaces\IConstructor;
use App\Services\Constructor\Interfaces\IConstructorCollection;

class Constructor implements IConstructor
{
    /**
     * Collection
     *
     * @var IConstructorCollection
     */
    private IConstructorCollection $collection;
    /**
     * Init
     *
     * @param IConstructorCollection $collection
     */
    public function __construct(IConstructorCollection $collection)
    {
        $this->collection = $collection;
    }
    /**
     * Get collection
     *
     * @return IConstructorCollection
     */
    public function collection(): IConstructorCollection
    {
        return $this->collection;
    }

    public function sum(): float
    {
        return $this->collection()->sum();
    }
}
