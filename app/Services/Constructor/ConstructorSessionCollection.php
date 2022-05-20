<?php

namespace App\Services\Constructor;

use App\Services\Constructor\Abstracts\array;
use App\Services\Constructor\Interfaces\IConstructorCollection;

class ConstructorSessionCollection implements IConstructorCollection
{
    private int $productId;

    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    public function add(string $key, array $item): bool
    {
        if(!key_exists($key, $_SESSION["constructor"][$this->productId] ?? [])){

            $_SESSION["constructor"][$this->productId][$key] = $item;

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

    public function replace(string $key, array $item): bool
    {
        if(key_exists($key, $_SESSION["constructor"][$this->productId] ?? [])){

            $_SESSION["constructor"][$this->productId][$key] = $item;

            $result = true;

        }

        return $result ?? false;
    }

    public function get(string $key): array
    {
        if(key_exists($key, $_SESSION["constructor"][$this->productId] ?? []))
            $result = $_SESSION["constructor"][$this->productId][$key];

        return $result ?? [];
    }

    public function all(): array
    {
        return $_SESSION["constructor"][$this->productId] ?? [];
    }

    public function sum(): float
    {
        $items = $this->all();

        $sum = 0.0;

        foreach($items as $item){
            if($item["checked"] == true)
                $sum+= (float) $item["price"];
        }

        return $sum;
    }
}
