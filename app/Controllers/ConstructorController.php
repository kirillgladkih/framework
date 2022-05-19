<?php

namespace App\Controllers;

use App\Helpers\IBlockHelper;
use App\Services\Constructor\Constructor;
use App\Services\Constructor\ConstructorFactory;
use App\Services\Constructor\Interfaces\IConstructor;
use App\Services\Mapping\ConstructorMap;
use Core\Config\Cnf;
use Core\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ConstructorController extends BaseController
{
    public function show(ServerRequestInterface $request): ResponseInterface
    {
        $iblockHelper = new IBlockHelper();

        $product = $iblockHelper->byId($request->getAttribute("id"));

        if(Cnf::application("PRODUCT_IBLOCK") == $product["fields"]["IBLOCK_ID"]){

            $constructor = ConstructorFactory::session(
                $request->getAttribute("id")
            );

            $result = $constructor->collection()->all();

        }

        return $this->jsonResponse($result ?? false);
    }

    public function check(ServerRequestInterface $request): ResponseInterface
    {
        $iblockHelper = new IBlockHelper();

        $product = $iblockHelper->byId($request->getAttribute("id"));

        if(Cnf::application("PRODUCT_IBLOCK") == $product["fields"]["IBLOCK_ID"]){

            $constructor = ConstructorFactory::session(
                $request->getAttribute("id")
            );


            $item = $constructor->collection()
                ->get($request->getParsedBody()["itemId"] ?? 0);

            if($item["main"] == false && $item["basic"] == false){

                $item["checked"] = $request->getParsedBody()["checked"];

                $constructor->collection()->replace($item["id"], $item);

                $result = $constructor->collection()->all();

            }

        }

        return $this->jsonResponse($result ?? false);
    }
}
