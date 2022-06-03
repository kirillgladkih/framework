<?php

namespace Core\Validation;

use Core\Request\Exception\BadRequestException;
use Core\Validation\Interfaces\IValidator;
use Exception;
use Psr\Http\Message\ServerRequestInterface;

class Validator implements IValidator
{
    protected array $errors = [];

    public function rules() : array
    {
        return [];
    }

    public function run(ServerRequestInterface $request) : ServerRequestInterface
    {
        $requestBody = $request->getParsedBody();

        foreach ($this->rules() as $attribute => $rule){

            if(!is_callable([$rule, "check"]))
                throw new Exception(
                    "$rule is not callable",
                    500
                );

            if(!$rule::check($requestBody[$attribute]))
                $this->errors[$attribute][] = $rule::message();

        }

        if(!empty($this->errors))
            throw new BadRequestException($request, $this->errors);

        return $request;
    }
}
