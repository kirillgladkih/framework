<?php

namespace App\Services\Mapping;

use App\Services\Mapping\Interface\IMapping;

class ConstructorMap implements IMapping
{
    public static function prepare(mixed $data): mixed
    {
        foreach ($data["SECTIONS"] as $section)
            $sections[] = [
                "name" => $section["NAME"],
                "description" => $section["DESCRIPTION"]
            ];

        return [
            "id" => $data["fields"]["ID"],
            "sections" => $sections ?? [],
            "iblockId" => $data["fields"]["IBLOCK_ID"],
            "name" => $data["fields"]["NAME"],
            "basic" => $data["BASIC"] ?? false,
            "checked" => $data["CHECKED"] ?? false,
            "main" => $data["MAIN"] ?? false,
            "price" => $data["PRICE"]["PRICE"],
            "preview_pricture" => $data["PREVIEW_PICTURE"],
            "currncy" => $data["PRICE"]["CURRENCY"],
            "quantity"=> $data["QUANTITY"]
        ];
    }
}
