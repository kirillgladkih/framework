<?php

namespace App\Services\Auth\Bitrix;

use App\Services\Auth\Interfaces\IUser;
use App\Services\Auth\UserTrait;

class User implements IUser
{
    use UserTrait;
}
