<?php

namespace App\Services\Auth;

use App\Entities\Table\UserTable;
use App\Services\Auth\Interfaces\IAuthentication;
use Bitrix\Main\Security\Password;

class Authentication implements IAuthentication
{
    public static function attempt(string $login, string $password): bool
    {
        $parameters = [
            "limit" => 1,
            "filter" => ["LOGIN" => $login],
            "select" => ["PASSWORD"]
        ];

        $result = UserTable::getList($parameters)
            ->fetchRaw()["PASSWORD"] ?? false;

        return Password::equals($result, $password);
    }
}
