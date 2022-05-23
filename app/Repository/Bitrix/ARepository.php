<?php

namespace App\Repository\Bitrix;

use App\Repository\Interfaces\IRepository;

abstract class ARepository implements IRepository
{
    protected string $entity;

    public function __construct()
    {
        $this->init();
    }

    public function byId(int $id): array|false
    {
        return $this->entity::getById($id)
            ->fetchRaw();
    }

    public function where(array $filter): array|false
    {
        $parameters["filter"] = $filter;

		$result = $this->entity::getList($parameters);

        $row = $result->fetchRaw();

		return (is_array($row) ? $row : false);
    }

    public function all(): array
    {
		$result = $this->entity::getList([]);

        $row = $result->fetchRaw();

		return (is_array($row) ? $row : false);
    }
    /**
     * Init entity
     *
     * @return void
     */
    abstract protected function init();
}
