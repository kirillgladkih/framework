<?php

namespace Core\Models\IBlock;

use Core\Models\Interfaces\IModel;
use Core\Models\Interfaces\IModelCollection;

class ModelCollection implements IModelCollection
{
    /**
     * IModel collection
     *
     * @var Model[]
     */
    protected array $collection = [];
    /**
     * Push collection
     * @param string $key
     * @param IModel $model
     * @return void
     */
    public function push(string $key, IModel $model)
    {
        $this->collection[$key] = $model;
    }
    /**
     * Remove collection item
     *
     * @param string $key
     * @return void
     */
    public function delete(string $key)
    {
        unset($this->collection[$key]);
    }
    /**
     * with Relations
     *
     * @return ModelCollection
     */
    public function withRelations(): ModelCollection
    {
        foreach($this->collection as $item)
            $item->withRelations();

        return clone $this;
    }
    /**
     * Get model collection
     *
     * @return array
     */
    public function get(): array
    {
        if(!is_null($this->collection)){
            foreach($this->collection as $element)
                $result[] = $element->get();
        }

        return $result ?? [];
    }
    /**
     * Get to array model collection
     *
     * @return array
     */
    public function toArray(): array
    {
        if(!is_null($this->collection)){
            foreach($this->collection as $element)
                $result[] = $element->toArray();
        }

        return $result ?? [];
    }
}
