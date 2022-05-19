<?php

namespace App\Services\Constructor;

use App\Services\Constructor\Abstracts\AConstructorItem;
use App\Services\Constructor\Interfaces\IConstructorCollection;

class ConstructorSessionCollection implements IConstructorCollection
{
    private int $productId;

    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    public function add(string $key, AConstructorItem $item): bool
    {
        if(!key_exists($key, $_SESSION["constructor"][$this->productId] ?? [])){

            $_SESSION["constructor"][$this->productId][$key] = $item->toArray();

            $result = true;

        }

        return $result ?? false;
    }

    public function delete(string $key): bool
    {
        if(key_exists($key, $_SESSION["constructor"][$this->productId] ?? [])){

            unset($_SESSION["constructor"][$this->productId][$key]);

            $result = true;

        }

        return $result ?? false;
    }

    public function replace(string $key, AConstructorItem $item): bool
    {
        if(key_exists($key, $_SESSION["constructor"][$this->productId] ?? [])){

            $_SESSION["constructor"][$this->productId][$key] = $item->toArray();

            $result = true;

        }

        return $result ?? false;
    }

    public function get(string $key): AConstructorItem
    {
        if(key_exists($key, $_SESSION["constructor"][$this->productId] ?? []))
            $result = $_SESSION["constructor"][$this->productId][$key];

        return new ConstructorItem($result) ?? false;
    }

    public function all(): array
    {
        $items = $_SESSION["constructor"][$this->productId] ?? [];

        foreach($items as $item)
            $result[] = new ConstructorItem($item);

        return $result ?? [];
    }

    public static function toArray(IConstructorCollection $collection): array
    {
        $items = $collection->all();

        foreach($items as $item)
            $result[] = $item->toArray();

        return $result ?? [];
    }
}
