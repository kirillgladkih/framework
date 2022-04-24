<?php

namespace Core\Routing\Iterfaces;

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
}
