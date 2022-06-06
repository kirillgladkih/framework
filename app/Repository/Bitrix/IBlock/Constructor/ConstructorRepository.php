<?php

namespace App\Repository\Bitrix\IBlock\Constructor;

use App\Entities\Models\IBlock\AProductModel;
use App\Entities\Models\IBlock\Constructor\Element;
use Exception;

class ConstructorRepository
{
    /**
     * Get all
     *
     * @return array
     */
    public function all(): array
    {
        $elements = Element::all()->toArray();

        foreach($elements as $element){

            $item = $this->detail($element["id"]);

            if(!empty($item))
                $result[$item["element"]["id"]] = $item;
        }

        return $result ?? [];
    }
    /**
     * Get detail
     *
     * @param integer $id
     * @return array
     */
    public function detail(int $id): array
    {
        $element = Element::byId($id)
            ->get()
            ->withRelations();

        if (!is_null($element->product)) {

            $product = $element->product->get()->withRelations();

            $basic = $product->basic ?? false;

            $complectaion = [];

            $denyIds = [];

            $configuration = $element->configuration;

            if ($basic) {

                foreach ($basic as $item) {

                    $item = $item->toArray()[0];

                    $complectaion[] = $item;

                    $denyIds[] = $item["id"];
                }
            }

            $result["element"] = $element->toArray();

            $result["product"] = $product->toArray();

            $result["basic"] = $complectaion;


            if ($configuration)

                foreach ($configuration as $item) {

                    $item = $item->get();

                    $products = $item->withRelations()
                        ->product;

                    foreach ($products as $product) {

                        $product = $product->toArray()[0];

                        if (in_array($product["id"], $denyIds))
                            continue;

                        $result["items"][$item->code][$product["id"]] = $product;
                    }
                }
        }

        return $result ?? [];
    }
}
