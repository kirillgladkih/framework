<?php

namespace Core\Request\Exception;

use Core\Response\Status;
use Psr\Http\Message\ServerRequestInterface;

class NotFoundException extends ARequestException
{
    public function __construct(ServerRequestInterface $request, \Throwable $previos = null)
    {
        parent::__construct(
            Status::getMessageForCode(Status::HTTP_NOT_FOUND),
            Status::HTTP_NOT_FOUND,
            $request,
            [],
            $previos
        );
    }
}
