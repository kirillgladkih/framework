<?php

namespace Core\Models\Interfaces;

interface IModel
{
    /**
     * Get to array
     *
     * @return array
     */
    public function toArray(): array;
    /**
     * Get table name
     *
     * @return string
     */
    public function tableName(): string;
    /**
     * Get
     *
     * @return IModel|boolean
     */
    public function get(): IModel|bool;
}
