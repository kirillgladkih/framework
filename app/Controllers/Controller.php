<?php

namespace App\Controllers;

use Core\Controllers\BaseController;
use Psr\Http\Message\ServerRequestInterface;

class Controller extends BaseController
{
    public function index(ServerRequestInterface $request)
    {
        return $this->jsonResponse([12]);
    }
}
