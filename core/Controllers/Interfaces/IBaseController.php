<?php

namespace Core\Controllers\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface IBaseController
{
    /**
     * Return json response
     *
     * @param mixed $data
     * @param integer $status
     * @param array $headers
     * @return ResponseInterface
     */
    public function jsonResponse(mixed $data, int $status = 200, array $headers = []) : ResponseInterface;
}
