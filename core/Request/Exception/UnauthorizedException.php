<?php

namespace Core\Request\Exception;

use Core\Response\Status;
use Psr\Http\Message\ServerRequestInterface;

class UnauthorizedException extends ARequestException
{
    public function __construct(ServerRequestInterface $request, \Throwable $previos = null)
    {
        parent::__construct(
            Status::getMessageForCode(Status::HTTP_UNAUTHORIZED),
            Status::HTTP_UNAUTHORIZED,
            $request,
            [],
            $previos
        );
    }
}
