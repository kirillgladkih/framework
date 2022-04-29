<?php

namespace Core\Controllers;

use Core\Controllers\Interfaces\IBaseController;
use Laminas\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ResponseInterface;

class BaseController implements IBaseController
{
    protected array $messages = [];

    public function jsonResponse(mixed $data, int $status = 200, array $headers = []) : ResponseInterface
    {
        $body = [
            "status" => $status,
            "messages" => $this->messages,
            "data" => $data
        ];

        return new JsonResponse($body, $status, $headers);
    }
}
