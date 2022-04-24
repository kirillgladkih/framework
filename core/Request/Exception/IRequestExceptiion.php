<?php

namespace Core\Request\Exception;

use Psr\Http\Message\RequestInterface;

interface IRequestExceptiion
{
    /**
     * Get request
     *
     * @return RequestInterface
     */
    public function getRequest() : RequestInterface;
}
