<?php

namespace Core\Request\Exception;

use Core\Response\Status;
use Psr\Http\Message\RequestInterface;

class MethodNotAllowedException extends ARequestException
{
    public function __construct(RequestInterface $request, \Throwable $previos = null)
    {
        parent::__construct(
            Status::getMessageForCode(Status::HTTP_METHOD_NOT_ALLOWED),
            Status::HTTP_METHOD_NOT_ALLOWED,
            $request,
            $previos
        );
    }
}
