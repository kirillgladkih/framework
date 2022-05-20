<?php

namespace Core\Validation;

use Core\Config\Cnf;
use Core\Validation\Interfaces\IRule;

class Resolver
{
    /**
     * Resolve rule
     *
     * @param mixed $handler
     * @param mixed $value
     * @return IRule
     */
    public function resolve(mixed $handler): IRule
    {
        if(is_string($handler)){
            if($class = Cnf::rules($handler))
                return new $class();
        }
    }
}
