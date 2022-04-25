<?php

namespace Core\Routing\Interfaces;

use Psr\Http\Message\RequestInterface;

interface IMatcher
{
    /**
     * Matching
     *
     * @param RequestInterface $request
     * @param IRoute $route
     * @return IRoute|boolean
     */
    public function match(RequestInterface $request, IRoute $route) : IRoute|bool;
}
