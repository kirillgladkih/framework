<?php

namespace Core\Routing\SimpleRouter;

use Core\Routing\Interfaces\IRoute;

class Route implements IRoute
{
    /**
     * Route path
     *
     * @var string
     */
    protected string $path;
    /**
     * Route handler
     *
     * @var mixed
     */
    protected mixed $handler;
    /**
     * Route rules
     *
     * @var array
     */
    protected array $rules;
    /**
     * Route methods
     *
     * @var array
     */
    protected array $methods;
    /**
     * init
     *
     * @param string $path
     * @param array $methods
     * @param mixed $handler
     * @param array $rules
     */
    public function __construct(string $path, array $methods = self::METHODS, mixed $handler, array $rules = [])
    {
        $this->path = $path;
        $this->methods = $methods;
        $this->rules = $rules;
        $this->handler = $handler;
    }
    /**
     * Get route path
     *
     * @return string
     */
    public function path(): string
    {
        return $this->path;
    }
    /**
     * Get route handler
     *
     * @return mixed
     */
    public function handler(): mixed
    {
        return $this->handler();
    }
    /**
     * Get route rules
     *
     * @return array
     */
    public function rules(): array
    {
        return $this->rules;
    }
    /**
     * Get route methods
     *
     * @return array
     */
    public function methods(): array
    {
        return $this->methods;
    }
}
