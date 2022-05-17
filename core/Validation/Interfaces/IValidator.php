<?php

namespace Core\Validation\Interfaces;

use Psr\Http\Message\ServerRequestInterface;

interface IValidator
{
    /**
     * Run validation
     *
     * @param ServerRequestInterface $request
     * @throws \Core\Request\Exception\IRequestExceptiion
     * @throws \Exception
     * @return ServerRequestInterface
     */
    public function run(ServerRequestInterface $request): ServerRequestInterface;
    /**
     * Get Rules
     *
     * @return Core\Validation\Interfaces\IRules[]
     */
    public function rules(): array;
}
