<?php

namespace App\Services\Mapping;

use App\Services\Mapping\Interface\IMapping;

class ConstructorMap implements IMapping
{
    public static function prepare(mixed $data): mixed
    {
        return [
            "id" => $data["fields"]["ID"],
            "iblockId" => $data["fields"]["IBLOCK_ID"],
            "name" => $data["fields"]["NAME"],
            "basic" => $data["BASIC"] ?? false,
            "checked" => $data["CHECKED"] ?? false,
            "main" => $data["MAIN"] ?? false,
            "price" => $data["PRICE"]["PRICE"],
            "currncy" => $data["PRICE"]["CURRENCY"]
        ];
    }
}
