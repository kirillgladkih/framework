<?php

namespace App\Services\Constructor;

use App\Helpers\CatalogHelper;
use App\Helpers\IBlockHelper;
use App\Services\Constructor\Interfaces\IConstructor;
use App\Services\Constructor\Interfaces\IConstructorFactory;
use App\Services\Mapping\ConstructorMap;

class ConstructorFactory implements IConstructorFactory
{
    /**
     * Create session collection
     *
     * @return IConstructor
     */
    public static function session(int $productId): IConstructor
    {
        $collection = new ConstructorSessionCollection($productId);

        $iblockHelper = new IBlockHelper();

        $catalogHelper = new CatalogHelper();

        $product = $iblockHelper->byId($productId);

        $items = [];

        $availableIds = $product["properties"]["AVAILABLE_OPTIONS"]["VALUE"]
            ? $product["properties"]["AVAILABLE_OPTIONS"]["VALUE"]
            : [];

        $basicIds = $product["properties"]["BASIC"]["VALUE"]
            ? $product["properties"]["BASIC"]["VALUE"]
            : [];

        $ids = array_unique(array_merge($basicIds, $availableIds));

        $ids[] = $productId;


        // foreach ($ids as $id){

        //     $item = $iblockHelper->byId($id);

        //     $item["BASIC"] = in_array($id, $basicIds);

        //     $item["CHECKED"] =  $collection->get($id)["checked"] ?? false;

        //     $item["PRICE"] = $catalogHelper->getBasePrice($id);

        //     $item["MAIN"] = $id == $productId ? true : false;

        //     $items[] = $item;

        // }

        // foreach($items as $item){

        //     $data = ConstructorMap::prepare($item);

        //     if(!$collection->add($data["id"], $data))
        //         $collection->replace($data["id"], $data);

        // }

        return new Constructor($collection);
    }
}
