<?php

namespace App\Services\Constructor\Interfaces;

use App\Services\Constructor\Abstracts\array;

interface IConstructorCollection
{
    /**
     * Add
     *
     * @param string $key
     * @param array $item
     * @return boolean
     */
    public function add(string $key, array $item): bool;
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
     * @param array $item
     * @return boolean
     */
    public function replace(string $key, array $item): bool;
    /**
     * Get items
     *
     * @return array[]
     */
    public function all(): array;
    /**
     * Get item
     *
     * @param string $key
     * @return array
     */
    public function get(string $key): array;
    /**
     * Get sum
     *
     * @return float
     */
    public function sum(): float;
}
