<?php

namespace Core\Models\IBlock;

use Bitrix\Iblock\ElementTable;
use Core\Models\Interfaces\IModel;
use CDBResult;
use Exception;

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
     * Deny props
     *
     * @var array
     */
    protected array $denyProps = [
        "relations"
    ];
    /**
     * init
     *
     * @param CDBResult|null $result
     */
    public function __construct(CDBResult $result = null)
    {
        $this->CDBResult = $result;

        $this->boot();

        if(!$result == null)
            $this->bind();
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
            ),
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
            ],
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
        if(!empty($this->collection)){

            $result = count($this->collection) == 1
                ? $this->collection[0]
                : $this->collection;

        }else{

            $result = clone $this;

        }

        return $result;
    }
    /**
     * Get to array
     *
     * @return array
     */
    public function toArray(): array
    {
        if(!empty($this->collection)){
            foreach($this->collection as $item)
                $result[] = $item->getProperties();
        }else{

            $result = $this->getProperties();

        }

        return $result ?? [];
    }
    protected function bind()
    {
        $relations = [];
        $props = [];
        /**
         * Bind properties
         */
        while ($element = $this->CDBResult->GetNext()){

            $propertiesIterator = \CIBlockElement::GetProperty(
                $element["IBLOCK_ID"],
                $element["ID"],
                false,
                false,
                array(">ID" => 1)
            );


            while($property = $propertiesIterator->GetNext()){

                if(!isset($props[$property["ID"]])){

                    $props[$property["ID"]] = $property;

                    if($property["MULTIPLE"] == "Y" && $property["VALUE"])
                        $props[$property["ID"]]["VALUE"] = [$property["VALUE"]];

                }else{

                    if($property["MULTIPLE"] == "Y"
                        && !in_array($property["VALUE"], $props[$property["ID"]]["VALUE"])){

                        $props[$property["ID"]]["VALUE"][] = $property["VALUE"];

                    }

                }
            }

            foreach($props as $prop){

                $element[$prop["CODE"]] = $prop;

                $value = $prop["VALUE"];

                if($prop["PROPERTY_TYPE"] == "E" && $value){

                    if(!is_array($value))
                        $value = [$value];

                        foreach($value as $id){

                            $elementTable = ElementTable::getById($id)->fetch();

                            $iblockId = $elementTable["IBLOCK_ID"];

                            $relation = $this->findRelation($iblockId);

                            $relationItem = [
                                "id" => "$id",
                                "iblockId" => $iblockId
                            ];

                            if($relation)
                                $relationItem = array_merge($relationItem, $relation);

                            $relations[] = $relationItem;

                    }

                }
            }

            $model = new static;

            $bindCallback = $this->bindCallback;
            /**
             * Bind fields
             */
            foreach(static::getFieldsMap() as $key => $map)
                $model->bindValue($map, $element[$key] ?? null);
            /**
             * Bind props
             */
            foreach(static::getPropMap() as $key => $map){
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
     * With relations
     *
     * @return Model
     */
    public function withRelations()
    {
        $thisRelations = [];

        $result = [];

        if(!empty($this->relations)){

            foreach ($this->relations as $relation){
                if(isset($relation["class"])
                    && isset($relation["property"])
                    && isset($relation["id"])
                    && isset($relation["iblockId"])
                ){
                    $res = IBlockActions::element(
                        [
                            "ID" => $relation["id"],
                            "IBLOCK_ID" => $relation["iblockId"]
                        ],
                    );

                    $model = new $relation["class"]($res);

                    $thisRelations[$relation["property"]][] = $model;

                }
            }
        }

        foreach($thisRelations as $key => $relations){

            if(isset($this->properties[$key])){

                $result[$key] = $this->properties[$key];

               foreach($relations as $relation){

                    $model = $relation->get();

                    if(!is_array($this->properties[$key]))
                        if($model->id == $this->properties[$key])
                            $result[$key] = $relation;


                    if(is_array($this->properties[$key])){

                        $index = array_search($model->id, $this->properties[$key]);

                        if(is_int($index))
                            $result[$key][$index] = $relation;

                    }
               }

            }

        }

        foreach($result as $key => $relations)
            $this->$key = $relations;

        return clone $this;
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
     * Find relation
     *
     * @param int $iblockId
     * @return array|bool
     */
    private function findRelation(int $iblockId): array|bool
    {
        foreach(static::relations() as $key => $classRelations){
            foreach($classRelations as $class => $relation)
               if($iblockId == $relation)
                    return [
                        "property" => $key,
                        "class" => $class
                    ];

        }

        return false;
    }
    // /**
    //  * Get select
    //  *
    //  * @return array
    //  */
    // public static function getSelect()
    // {
    //     $select = array_keys(static::getFieldsMap());

    //     foreach(static::getPropMap() as $key => $prop)
    //         $select[] = "PROPERTY_" . $key;

    //     return $select;
    // }
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
