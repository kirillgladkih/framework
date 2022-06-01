<?php

namespace Core\Routing\Interfaces;

interface IAttributeCollection
{
    /**
     * Set attribute in colleciton
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function set(string $name, mixed $value) : void;
    /**
     * Get attribute in collection
     *
     * @param string $name
     * @return mixed
     */
    public function get(string $name) : mixed;
    /**
     * Get attributes in collection
     *
     * @return array
     */
    public function all() : array;
}
