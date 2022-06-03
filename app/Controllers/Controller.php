<?php

namespace App\Controllers;

use App\Validation\TestValidator;
use Core\Controllers\BaseController;
use Psr\Http\Message\ResponseInterface;
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

        // $validator = new TestValidator($request);

        // $validator->make();

        // return $this->jsonResponse($validator->errors());
        dd(1);
    }
}
