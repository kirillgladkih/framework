<?php

namespace Core\Routing\SimpleRouter;

use Core\Routing\Interfaces\IAttributeCollection;

class AttributeCollection implements IAttributeCollection
{
    protected array $attributes = [];

    public function set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function get(string $name): mixed
    {
        return $this->attributes[$name];
    }

    public function all(): array
    {
        return $this->attributes;
    }
}
