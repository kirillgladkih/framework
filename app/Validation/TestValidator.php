<?php

namespace App\Validation;

use App\Validation\Rules\RequiredRule;
use Core\Validation\Validator;

class TestValidator extends Validator
{
    /**
     * Get validation rules
     *
     * @return array
     */
    public function rules() : array
    {
        /**
         * ЗДЕСЬ ЗАПОЛНЯЮТСЯ ПРАВИЛА ВАЛИДАЦИИ
         * ПРАВИЛА ВАЛИДАЦИИ НАХОДЯТСЯ app/Validation/Rules
         */
        return [
           "id" => RequiredRule::class
        ];
    }
}
