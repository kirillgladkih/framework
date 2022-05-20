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


        foreach ($ids as $id){

            $item = $iblockHelper->byId($id, [], ["IBLOCK_SECTION_ID", "PREVIEW_PICTURE"]);

            $item["BASIC"] = in_array($id, $basicIds);

            $sectionId = $item["fields"]["IBLOCK_SECTION_ID"];

            $item["SECTIONS"] = $sectionId
                ? $iblockHelper->navigationChain($sectionId)
                : [];

            $item["MAIN"] = $id == $productId ? true : false;

            $checked = $collection->get($id)["checked"] || $id == $productId
                ? true
                : false;

            $previewPicture = $item["fields"]["PREVIEW_PICTURE"] ?? false;

            $item["PREVIEW_PICTURE"] = $previewPicture ?
                $iblockHelper->pictureSrcById($previewPicture)
                : "";

            $item["CHECKED"] =  $checked;

            $item["PRICE"] = $catalogHelper->getBasePrice($id);

            $item["QUANTITY"] = $collection->get($id)["quantity"] ?? 1;

            $items[] = $item;

        }

        foreach($items as $item){

            $data = ConstructorMap::prepare($item);

            if(!$collection->add($data["id"], $data))
                $collection->replace($data["id"], $data);

        }

        return new Constructor($collection);
    }
}
