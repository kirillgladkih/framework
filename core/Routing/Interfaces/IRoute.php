<?php

namespace Core\Routing\Interfaces;

interface IRoute
{
    /**
     * Http methods
     */
    const METHODS = [
        "GET",
        "HEAD",
        "POST",
        "PUT",
        "DELETE",
        "OPTIONS",
        "PATCH"
    ];
    /**
     * Get route path
     *
     * @return string
     */
    public function path() : string;
    /**
     * Get route allow methods
     *
     * @return array
     */
    public function methods() : array;
    /**
     * Get route handler
     *
     * @return mixed
     */
    public function handler() : mixed;
    /**
     * Get route rules
     *
     * @return array
     */
    public function rules() : array;
    /**
     * Get Attribute collection
     *
     * @return IAttributeCollection
     */
    public function attributes() : IAttributeCollection;
}
