<?php

namespace Core\Middleware;

use Core\Middleware\Interface\IMiddleware;
use Psr\Http\Message\RequestInterface;

class Middleware implements IMiddleware
{
    /**
     * Request
     *
     * @var RequestInterface
     */
    protected RequestInterface $reqeust;
    /**
     * Init
     *
     * @param RequestInterface $reqeust
     */
    public function __construct(RequestInterface $reqeust)
    {
        $this->reqeust = $reqeust;
    }
    /**
     * Handle
     *
     * @param mixed $handler
     * @return mixed
     */
    public function handle(mixed $handler): mixed
    {

    }
}
