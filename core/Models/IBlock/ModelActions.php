<?php

namespace Core\Models\IBlock;

use CModule;
use Core\Models\Interfaces\IModelCollection;
use Core\Models\Interfaces\IModel;
use Core\Models\Interfaces\IModelActions;

class ModelActions implements IModelActions
{
    /**
     * Model
     *
     * @var Model
     */
    protected Model $model;
    /**
     * Model
     *
     * @var string
     */
    protected string $modelClass;
    /**
     * Init
     *
     * @param string $modelClass
     */
    public function __construct(Model $model)
    {
        CModule::IncludeModule("iblock");

        $this->model = $model;

        $this->modelClass = $model::class;
    }
    /**
     * Element by id
     *
     * @param integer $id
     * @return
     */
    public function byId(int $id): Model
    {
        $filter = [
            "ID" => "$id",
        ];

        $element = $this->element($filter)
            ->GetNextElement();

        return new $this->modelClass($element);
    }
    /**
     * Get all elements
     *
     * @return ModelCollection
     */
    public function all(): ModelCollection
    {
        $result = new ModelCollection();

        $filter = [
            "IBLOCK_ID" => $this->model->tableName()
        ];

        $iterator = $this->listIterator($filter);

        $i = 0;

        while($element = $iterator->GetNextElement()){

            $i++;

            $model = new $this->modelClass($element);

            $result->push($i, $model);

        }

        return $result;
    }
    /**
     * Get element where = filter
     *
     * @param array $filter
     * @return ModelCollection
     */
    public function where(array $filter = []): ModelCollection
    {
        $result = new ModelCollection();

        $filter = array_merge($this->defaultFilter(), $filter);

        $iterator = $this->listIterator($filter);

        $i = 0;

        while($element = $iterator->GetNextElement()){

            $i++;

            $model = new $this->modelClass($element);

            $result->push($i, $model);

        }

        return $result;
    }
    /**
     * Get default filter
     *
     * @return array
     */
    private function defaultFilter(): array
    {
        return [
            // "IBLOCK_ID" => $this->model->tableName()
        ];
    }
    /**
     * Get default select
     *
     * @return array
     */
    private function defaultSelect(): array
    {
        $select =  [
            "ID",
            "TIMESTAMP_X",
            "MODIFIED_BY",
            "CREATED",
            "CREATED_DATE",
            "CREATED_BY",
            "IBLOCK_ID",
            "ACTIVE",
            "ACTIVE_FROM",
            "ACTIVE_TO",
            "SORT",
            "NAME",
            "SHOW_COUNTER",
            "SHOW_COUNTER_START",
            "CODE",
            "TAGS",
            "XML_ID",
            "STATUS",
            "SECTION_ID",
            "IBLOCK_SECTION_ID",
            "IBLOCK_NAME",
            "IBLOCK_CODE"
        ];

        $fieldsMap = $this->model->getFieldsMap() ?? [];

        foreach($fieldsMap as $key => $map)
            if(!in_array($key, $select))
                $select[] = $key;

        return $select;
    }
    /**
     * Get list iterator
     *
     * @param array $filter
     * @param array $select
     * @param mixed $navStartParams
     * @param array $order
     * @param mixed $groupBy
     * @return \CIBlockResult
     */
    protected function listIterator(
        array $filter,
        array $select = [],
        mixed $navStartParams = false,
        array $order = [],
        mixed $groupBy = false
    ): \CIBlockResult {

        $filter = array_merge($filter, $this->defaultFilter());
        $select = array_merge($filter, $this->defaultSelect());

        return \CIBlockElement::GetList(
            $order,
            $filter,
            $groupBy,
            $navStartParams,
            $select
        );
    }
    /**
     * Get list iterator
     *
     * @param array $filter
     * @param array $select
     * @param mixed $navStartParams
     * @param array $order
     * @param mixed $groupBy
     * @return \CIBlockResult
     */
    protected function element(
        array $filter,
        array $select = [],
        mixed $navStartParams = false,
        array $order = [],
        mixed $groupBy = false
    ): \CIBlockResult {

        $select = array_merge($filter, $this->defaultSelect());

        return \CIBlockElement::GetList(
            $order,
            $filter,
            $groupBy,
            $navStartParams,
            $select
        );
    }
}
