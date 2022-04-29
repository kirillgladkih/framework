<?php

namespace Core\Middleware\Exception;

class NotFoundMIddlewareException extends AMiddlewareException
{
    /**
     * Inint
     *
     * @param string $name
     */
    public function __construct(string $name, \Throwable $previos = null)
    {
        parent::__construct(
            "Middleware $name not found in config/midlleware.php",
            $previos
        );
    }
}
