<?php

namespace Core\Request\Exception;

use Psr\Http\Message\RequestInterface;

abstract class ARequestException extends \LogicException implements IRequestExceptiion
{
    /**
     * Request
     *
     * @var RequestInterface
     */
    protected RequestInterface $request;

    public function __construct(string $message = "", int $code = 500, RequestInterface $request, \Throwable $previos = null)
    {
        $this->request = $request;

        parent::__construct($message, $code, $previos);
    }

    public function getRequest(): RequestInterface
    {
        return $this->request;
    }
}
