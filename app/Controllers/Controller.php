<?php

namespace App\Controllers;

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
        return $this->jsonResponse(["id" => $request->getAttribute("id")]);
    }
}
