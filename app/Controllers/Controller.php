<?php

namespace App\Controllers;

use App\Entities\Models\IBlock\Catalog\Product;
use App\Entities\Models\IBlock\Catalog\Wheel;
use App\Entities\Models\IBlock\Constructor\Element;
use Core\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
use App\Services\Validation\TestValidator;
use Core\Models\IBlock\ModelActions;
use Psr\Http\Message\ServerRequestInterface;

/**
 * КАЖДЫЙ МЕТОД КОНТРОЛЛЕРА ДОЛЖЕН ПРИНИМАТЬ ServerRequestInterface $request
 * И ВОЗВРАЩАТЬ ResponseInterface
 * НАПРИМЕР $this->jsonResponse(), РЕАЛИЗАЦИЯ ДАННОГО МЕТОДА НАХОДИТСЯ В
 * /framework/core/Controllers/BaseController.php
 */

class Controller extends BaseController
{
    /**
     * Undocumented function
     *
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function index(ServerRequestInterface $request): ResponseInterface
    {
        dd(1);
    }

    public function store(ServerRequestInterface $request): ResponseInterface
    {
        /**
         * ПРИМЕР ВАЛИДАТОРА СМОТРЕТЬ app/Validation/TestValidator.php
         */
        $validator = new TestValidator();

        $validator->run($request);

        return $this->jsonResponse("ok");
    }
}
