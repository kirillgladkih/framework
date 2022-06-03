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
        $fieldsMap = array_values($this->getFieldsMap());

        $propMap = array_values($this->getPropMap());

        $map = array_merge($fieldsMap, $propMap);

        return $map;
    }
    /**
     * Get fields map
     *
     * @return array
     */
    abstract function getFieldsMap(): array;
    /**
     * Get properies map
     *
     * @return array
     */
    abstract function getPropMap(): array;
}
