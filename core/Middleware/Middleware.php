<?php

namespace Core\Middleware;

use Core\Middleware\Interfaces\IMiddleware;
use Psr\Http\Message\ServerRequestInterface;

class Middleware implements IMiddleware
{
    /**
     * Request
     *
     * @var ServerRequestInterface
     */
    protected ServerRequestInterface $request;
    /**
     * Init
     *
     * @param ServerRequestInterface $request
     */
    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;
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
