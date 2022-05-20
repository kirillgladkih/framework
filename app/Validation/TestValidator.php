<?php

namespace App\Validation;

use Core\Validation\Validator;

class TestValidator extends Validator
{
    protected function rules(): array
    {
        return [
            "id" => ["required"]
        ];
    }
}
