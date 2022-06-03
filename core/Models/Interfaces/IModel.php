<?php

namespace Core\Models\Interfaces;

interface IModel
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName(): string;
}
