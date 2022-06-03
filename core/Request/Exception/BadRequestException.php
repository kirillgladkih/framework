<?php

namespace Core\Request\Exception;

use Core\Response\Status;
use Psr\Http\Message\ServerRequestInterface;

class BadRequestException extends ARequestException
{
    public function __construct(ServerRequestInterface $request, array $errors = [], \Throwable $previos = null)
    {
        parent::__construct(
            Status::getMessageForCode(Status::HTTP_BAD_REQUEST,),
            Status::HTTP_BAD_REQUEST,
            $request,
            $errors,
            $previos
        );

        $this->errors = $errors;
    }
}
