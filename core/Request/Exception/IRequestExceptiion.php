<?php

namespace Core\Request\Exception;

use Psr\Http\Message\ServerRequestInterface;

interface IRequestExceptiion
{
    /**
     * Get request
     *
     * @return \Psr\Http\Message\ServerRequestInterface
     */
    public function getRequest() : ServerRequestInterface;
    /**
     * Get errors
     *
     * @return array
     */
    public function getErrors() : array;
}
