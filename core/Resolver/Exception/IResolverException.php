<?php

namespace Core\Resolver\Exception;

interface IResolverException
{
    /**
     * Get handler
     *
     * @return mixed
     */
    public function getHandler() : mixed;
}
