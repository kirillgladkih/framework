<?php

namespace Core\Routing\Interfaces;

use Psr\Http\Message\ServerRequestInterface;

interface IMatcher
{
    /**
     * Matching
     *
     * @param ServerRequestInterface $request
     * @param IRoute $route
     * @return IRoute|boolean
     */
    public function match(ServerRequestInterface $request, IRoute $route) : IRoute|bool;
}
