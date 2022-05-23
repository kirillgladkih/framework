<?php

namespace App\Repository\Interfaces;

interface IRepository
{
    /**
     * Get by id
     *
     * @param integer $id
     * @return array|false
     */
    public function byId(int $id): array|false;
    /**
     * Get all
     *
     * @return array
     */
    public function all(): array;
    /**
     * Fetch where
     *
     * @param array $filter
     * @return array|false
     */
    public function where(array $filter): array|false;
}
