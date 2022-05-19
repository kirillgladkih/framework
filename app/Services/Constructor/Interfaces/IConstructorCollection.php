<?php

namespace App\Services\Constructor\Interfaces;

use App\Services\Constructor\Abstracts\AConstructorItem;

interface IConstructorCollection
{
    /**
     * Add
     *
     * @param string $key
     * @param AConstructorItem $item
     * @return boolean
     */
    public function add(string $key, AConstructorItem $item): bool;
    /**
     * Delete item
     *
     * @param string $key
     * @return boolean
     */
    public function delete(string $key): bool;
    /**
     * Replace item
     *
     * @param string $key
     * @param AConstructorItem $item
     * @return boolean
     */
    public function replace(string $key, AConstructorItem $item): bool;
    /**
     * Get items
     *
     * @return AConstructorItem[]
     */
    public function all(): array;
    /**
     * Get item
     *
     * @param string $key
     * @return AConstructorItem
     */
    public function get(string $key): AConstructorItem;
    /**
     * Get to array
     * @param IConstructorCollection $collection
     * @return array
     */
    public static function toArray(IConstructorCollection $collection): array;
}
