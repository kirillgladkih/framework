<?php

namespace Core\Models\IBlock;

use Bitrix\Iblock\ElementTable;
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
     * Relations
     *
     * @var array
     */
    protected array $relations = [];
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
    public static function all(array $filter = []): Model
    {
        $result = IBlockActions::listElement(
            array_merge(
                [
                "IBLOCK_ID" => static::tableName()
                ],
                $filter
            )
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

        $relations = [];

        /**
         * Bind properties
         */
        while ($element = $this->CDBResult->GetNext()){

            foreach($props as $prop){

                if(isset($element["~PROPERTY_".$prop["ID"]])){

                    $element[$prop["CODE"]] =  $prop;

                    $value = $element["~PROPERTY_".$prop["ID"]];

                    $element[$prop["CODE"]]["VALUE"] = $value;

                    if($prop["PROPERTY_TYPE"] == "E"){

                        if(!is_array($value))
                            $value = [$value];

                        foreach($value as $id){

                            $elementTable = ElementTable::getById($id)->fetch();

                            $relations[$id] = ["iblock_id" => $elementTable["IBLOCK_ID"]];

                        }

                    }

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
            foreach($this->getPropMap() as $key => $map){
                $model->bindValue($map, $element[$key]["VALUE"] ?? null);
            }
            /**
             * Bind relations
             */
            $model->bindValue("relations", $relations);
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
     * Get ralations
     *
     * @return array
     */
    public function getRelations(): array
    {
        return $this->relations;
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
    /**
     * Iblocks id
     * Model => iblockID
     * @return array
     */
    abstract static function iblocks(): array;
    /**
     * Relations
     * Map => Model
     * @return array
     */
    abstract static function relations(): array;
}
