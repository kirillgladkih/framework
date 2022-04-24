<?php

namespace Core\Request\Exception;

use Core\Response\Status;
use Psr\Http\Message\RequestInterface;

class NotFoundException extends ARequestException
{
    public function __construct(RequestInterface $request, \Throwable $previos = null)
    {
        parent::__construct(
            Status::getMessageForCode(Status::HTTP_NOT_FOUND),
            Status::HTTP_NOT_FOUND,
            $request,
            $previos
        );
    }
}
