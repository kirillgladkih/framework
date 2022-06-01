<?php

namespace Core\Request\Exception;

use Psr\Http\Message\ServerRequestInterface;

abstract class ARequestException extends \LogicException implements IRequestExceptiion
{
    /**
     * Request
     *
     * @var RequestInterface
     */
    protected ServerRequestInterface $request;

    protected array $errors = [];

    public function __construct(
        string $message = "",
        int $code = 500,
        ServerRequestInterface $request,
        $errors = [],
        \Throwable $previos = null)
    {
        $this->request = $request;

        $this->errors = $errors;

        parent::__construct($message, $code, $previos);
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }
    /**
     * Undocumented function
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
