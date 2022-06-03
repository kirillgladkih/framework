<?php

namespace App\Controllers;

use App\Entities\Models\IBlock\Catalog\Wheel;
use App\Helpers\IBlockHelper;
use App\Repository\Bitrix\IBlock\Constructor\ConstructorRepository;
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
    /**
     * Undocumented function
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        $repository = new ConstructorRepository();

        $result = $repository->all();

        return $this->jsonResponse($result);
    }
}
