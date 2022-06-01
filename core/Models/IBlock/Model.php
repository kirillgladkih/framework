<?php

namespace Core\Models\IBlock;

use _CIBElement;
use Core\Models\IBlock\Interfaces\IModelActions;
use Core\Models\Interfaces\IModel;
use Core\Models\Interfaces\IModelCollection;

abstract class Model implements IModel
{
    use ModelTrait;
    /**
     * Element
     *
     * @var _CIBElement|null
     */
    protected _CIBElement|null $element;
    /**
     * Relations
     *
     * @var array
     */
    protected array $relations = [];
    /**
     * Bind callback
     *
     * @var callable
     */
    protected $bindCallback;
    /**
     * Init
     *
     * @param _CIBElement $element
     * @return void
     */
    public function __construct(_CIBElement $element = null)
    {
        $this->element = $element;

        $this->boot();

        if(!is_null($element))
            $this->bind();

    }
    /**
     * Get result
     *
     * @return IModel
     */
    public function get(): IModel|bool
    {
        if(!is_null($this->element))
            $result = clone $this;

        return $result ?? false;
    }
    /**
     * Get to array
     *
     * @return array
     */
    public function toArray(): array
    {
        if(!is_null($this->element)){

            foreach($this->getMap() as $map){

                if($this->$map instanceof IModelCollection){

                    $result[$map] = $this->$map->toArray();

                }else{

                    $result[$map] = $this->$map ?? null;

                }

            }
        }

        return $result ?? [];
    }
    /**
     * Bind relations
     *
     * @return Model
     */
    public function withRelations()
    {
        foreach($this->relations as $map => $relation){

            $model = new $relation["model"];

            $actions = new ModelActions($model);

            if(!is_array($relation["id"]))
                $this->$map = $actions->byId($relation["id"]);

            if(is_array($relation["id"])){

                if(!$this->$map instanceof IModelCollection)
                    $this->$map = new ModelCollection();

                foreach($relation["id"] as $id){

                    $model = $actions->byId($id);

                    $this->$map->push($id, $model);

                }

            }

        }

        return clone $this;
    }
    /**
     * Bind to class properties
     *
     * @return void
     */
    protected function bind()
    {
        $properties = $this->element->GetProperties();

        $fields = $this->element->GetFields();

        $bindCallback = $this->bindCallback;
        /**
         * Bind callback
         */
        $bindCallback($fields, $properties, $this);

        foreach($this->getPropMap() as $key => $map){
            /**
             * Bind value
             */
            $this->bindValue($map, $properties[$key]["VALUE"] ?? null);
            /**
             * Привязка к элементам инфоблока
             */
            if(!isset($properties[$key]))
                continue;

            if($properties[$key]["PROPERTY_TYPE"] == "E"){

                if(!$properties[$key]["VALUE"] ||
                    !isset($this->relations()[$map]))
                    continue;

                $relationsIds = $properties[$key]["VALUE"];

                $this->relations[$map] = [
                    "id" => $relationsIds,
                    "model" => $this->relations()[$map]
                ];
            }

        }

        foreach($this->getFieldsMap() as $key => $map)
            $this->bindValue($map, $fields[$key] ?? null);
    }
    /**
     * Relations
     *
     * @return array
     */
    abstract protected function relations(): array;
    /**
     * Bootstrap
     *
     * @return void
     */
    protected function boot()
    {

    }
    /**
     * Bind value
     *
     * @param string $map
     * @param mixed $value
     * @return void
     */
    protected function bindValue(string $map, mixed $value)
    {
        $this->properties[$map] = $value ?? null;

        if(property_exists($this, $map))
            $this->$map = $value;
    }
}
