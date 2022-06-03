<?php

namespace Core\Models\IBlock;

use _CIBElement;
use Bitrix\Iblock\Copy\Implement\Iblock;
use Core\Models\Interfaces\IModel;
use CDBResult;

abstract class Model implements IModel
{
    use ModelTrait;
    /**
     * CDBResult
     *
     * @var CDBResult|null
     */
    protected CDBResult|null $CDBResult;
    /**
     * Bind extented function
     *
     * @var callable
     */
    protected $bindCallback;
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected array $collection = [];
    /**
     * init
     *
     * @param CDBResult|null $result
     */
    public function __construct(CDBResult $result = null)
    {
        $this->CDBResult = $result;

        $this->boot();
    }
    /**
     * Get all
     *
     * @return Model
     */
    public static function all(): Model
    {
        $result = IBlockActions::listElement(
            [
                "IBLOCK_ID" => static::tableName()
            ]
        );

        $model = new static($result);

        return clone $model;
    }
    /**
     * Get by id
     *
     * @param integer $id
     * @return Model
     */
    public static function byId(int $id): Model
    {
        $result = IBlockActions::element(
            [
                "ID" => $id,
                "IBLOCK_ID" => static::tableName()
            ]
        );

        $model = new static($result);

        return clone $model;
    }
    /**
     * Get
     *
     * @return mixed
     */
    public function get(): mixed
    {
        $this->bind();

        if(!empty($this->collection))
            $result = count($this->collection) == 1
                ? $this->collection[0]
                : $this->collection;

        return $result ?? false;
    }
    /**
     * Get to array
     *
     * @return array
     */
    public function toArray(): array
    {
        $getResult = $this->get();

        if($getResult){

            if(!is_array($getResult))
                $getResult = [$getResult];


            foreach($getResult as $model)
                $result[] = $model->getProperties();

        }

        return $result ?? [];
    }

    protected function bind()
    {
        $props = $this->CDBResult->arIBlockAllProps;
        /**
         * Bind properties
         */
        while ($element = $this->CDBResult->GetNext()){

            foreach($props as $prop){

                if(isset($element["~PROPERTY_".$prop["ID"]])){

                    $element[$prop["CODE"]] =  $prop;

                    $element[$prop["CODE"]]["VALUE"] =  $element["~PROPERTY_".$prop["ID"]];
                }

            }

            $model = new static;

            $bindCallback = $this->bindCallback;
            /**
             * Bind fields
             */
            foreach($this->getFieldsMap() as $key => $map)
                $model->bindValue($map, $element[$key] ?? null);
            /**
             * Bind props
             */
            foreach($this->getPropMap() as $key => $map)
                $model->bindValue($map, $element[$key]["VALUE"] ?? null);
            /**
             * Bind callback
             */
            $bindCallback($element, $model);
            /**
             * Add as collection
             */
            $this->collection[] = $model;
        }
    }
    /**
     * Get properties
     *
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
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
    /**
     * Boot
     *
     * @return void
     */
    protected function boot()
    {
        $this->bindCallback = function(){};
    }
}
