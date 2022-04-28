<?php

namespace App\Controllers;

use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\RequestInterface;

// use Src\Controllers\BaseController;

class Controller
{
    public function index(RequestInterface $request)
    {
        return new JsonResponse($request);
    }
}
