<?php

namespace Core\Models\IBlock;

trait ModelTrait
{
    /**
     * Properties
     *
     * @var array
     */
    protected array $properties = [];
    /**
     * Relations
     *
     * @var array
     */
    protected array $relations = [];
    /**
     * init
     */
    public function __construct()
    {
        \CModule::IncludeModule("iblock");
    }
    /**
     * Get property
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $map = $this->getMap();

        if(!in_array($name, $map))
            throw new \Exception("unknow property $name");

        return $this->properties[$name] ?? false;
    }
    /**
     * Set property
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value)
    {
        $map = $this->getMap();

        if(!in_array($name, $map))
            throw new \Exception("unknow property $name");

        $this->properties[$name] = $value;
    }
    /**
     * Get map
     *
     * @return array
     */
    private function getMap(): array
    {
        $fieldsMap = array_values(static::getFieldsMap());

        $propMap = array_values(static::getPropMap());

        $map = array_merge($fieldsMap, $propMap);

        return $map;
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
        foreach($this->properties as $key => $prop){
            if(!in_array($key, $this->denyProps))
                $result[$key] = $prop;
        }

        return $result ?? [];
    }
    /**
     * Get fields map
     *
     * @return array
     */
    abstract static function getFieldsMap(): array;
    /**
     * Get properies map
     *
     * @return array
     */
    abstract static function getPropMap(): array;
}
