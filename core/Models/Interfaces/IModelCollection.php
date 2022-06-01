<?php

namespace Core\Models\Interfaces;

interface IModelCollection
{
    /**
     * Get to array
     *
     * @return array
     */
    public function toArray(): array;
    /**
     * Get
     *
     * @return IModel[]
     */
    public function get(): array;
}
