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
     * Get route pattern
     *
     * @return string
     */
    public function getPattern() : string;
    /**
     * Get route handler
     *
     * @return mixed
     */
    public function getHandler() : mixed;
    /**
     * Get route tokens
     *
     * @return array
     */
    public function getTokens() : array;
    /**
     * Get route methods
     *
     * @return array
     */
    public function getMethods() : array;
    /**
     * Set tokens for route
     *
     * @param array $tokens
     * @return void
     */
    public function setTokens(array $tokens) : void;

    /**
     * Get atributes collection
     *
     * @return IAttributeCollection
     */
    public function getAttributeCollection() : IAttributeCollection;
    /**
     * Get middleware collection
     *
     * @return IMiddlewareCollection
     */
    public function getMiddlewareCollection() : IMiddlewareCollection;

}
