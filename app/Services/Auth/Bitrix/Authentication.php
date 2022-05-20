<?php

namespace App\Services\Bitrix\Auth;

use App\Services\Auth\Interfaces\IAuthentication;
use Bitrix\Main\Security\Password;
use Bitrix\Main\UserTable;

class Authentication implements IAuthentication
{
    public function attempt(string $login, string $password): bool
    {
        $userData = UserTable::GetRow([
            'filter' => ['=LOGIN' => $login, '=ACTIVE' => 'Y'],
            'select' => ['PASSWORD'],
        ]);

        return Password::equals($userData['PASSWORD'], $password);
    }
}
