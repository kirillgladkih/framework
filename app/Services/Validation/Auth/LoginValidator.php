<?php

namespace App\Services\Validation\Auth;

use App\Services\Validation\Rules\RequiredRule;
use Core\Validation\Validator;

class LoginValidator extends Validator
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
           "password" => RequiredRule::class,
           "login" => RequiredRule::class
        ];
    }
}
