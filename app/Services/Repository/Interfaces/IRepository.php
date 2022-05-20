<?php

namespace App\Services\Repository\Interfaces;

use App\Services\Models\Interface\IModel;

interface IRepository
{
    /**
     * Get all
     *
     * @return IModel[]
     */
    public function all(): array;
    /**
     * Get by id
     *
     * @param integer $id
     * @return IModel
     */
    public function byId(int $id): IModel;
    /**
     * Get Models with filter
     *
     * @param array $filter
     * @return IModel[]
     */
    public function where(array $filter): array;
}
