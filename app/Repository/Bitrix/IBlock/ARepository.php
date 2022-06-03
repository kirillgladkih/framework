<?php

namespace App\Repository\Bitrix\IBlock;

use App\Repository\Interfaces\IRepository;
use Core\Models\IBlock\ModelActions;

abstract class ARepository implements IRepository
{
    protected ModelActions $actionClass;

    public function __construct()
    {
        $this->init();
    }

    public function byId(int $id): array|false
    {
        $result = $this->actionClass->byId($id);

        return $result->toArray() ?? false;
    }

    public function where(array $filter): array|false
    {
        $result = $this->actionClass->where($filter);

        return $result->toArray() ?? false;
    }

    public function all(): array
    {
        $result = $this->actionClass->all();

        return $result->toArray() ?? [];
    }
    /**
     * Init entity
     *
     * @return void
     */
    abstract protected function init();
}
