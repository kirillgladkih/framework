<?php

namespace Core\Routing\Router;

use Core\Routing\Interfaces\IAttributeCollection;
use Core\Routing\Interfaces\IMiddlewareCollection;
use Core\Routing\Interfaces\IRoute;

class Route implements IRoute
{
    /**
     * Route pattern
     *
     * @var string
     */
    protected string $pattern = "";
    /**
     * Route handler
     *
     * @var mixed
     */
    protected mixed $handler = null;
    /**
     * Route tokens
     *
     * @var array
     */
    protected array $tokens = [];
    /**
     * Route methods
     *
     * @var array
     */
    protected array $methods = [];
    /**
     * Route middleware collection
     *
     * @var IMiddlewareCollection
     */
    protected IMiddlewareCollection $middlewareCollection;
    /**
     * Route attribute collection
     *
     * @var IAttributeCollection
     */
    protected IAttributeCollection $attributeCollection;
    /**
     * Init
     *
     * @param string $pattern
     * @param mixed $handler
     * @param [type] $methods
     */
    public function __construct(
        string $pattern,
        mixed $handler,
        array $methods = self::METHODS
    ){
        $this->pattern = $pattern;
        $this->handler = $handler;
        $this->methods = $methods;
        $this->attributeCollection = new AttributeColletion();
        $this->middlewareCollection = new MiddlewareCollection();
    }
    /**
     * Get route methods
     *
     * @return array
     */
    public function getMethods() : array
    {
        return $this->methods;
    }
    /**
     * Get route handler
     *
     * @return mixed
     */
    public function getHandler() : mixed
    {
        return $this->handler;
    }
    /**
     * Get route pattern
     *
     * @return string
     */
    public function getPattern() : string
    {
        return $this->pattern;
    }
    /**
     * Get route tokens
     *
     * @return array
     */
    public function getTokens() : array
    {
        return $this->tokens;
    }
    /**
     * Set tokens for route
     *
     * @param array $tokens
     * @return void
     */
    public function setTokens(array $tokens): void
    {
        $this->tokens = $tokens;
    }
    /**
     * Get attribute collection
     *
     * @return IAttributeCollection
     */
    public function getAttributeCollection(): IAttributeCollection
    {
        return $this->attributeCollection;
    }
    /**
     * Get middleware collection
     *
     * @return IMiddlewareCollection
     */
    public function getMiddlewareCollection(): IMiddlewareCollection
    {
        return $this->middlewareCollection;
    }
}
