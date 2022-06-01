<?php

namespace App\Services\Auth\Basic;

use App\Services\Auth\Interfaces\IUser;
use App\Repository\Bitrix\Table\UserRepository;

class User implements IUser
{
    use UserTrait;

    public function __construct(int $id)
    {
        $repository = new UserRepository();

        $user = $repository->byId($id);

        if(!$user)
            throw new \Exception("user ID:$id not found");

        $this->login = $user["LOGIN"];
        $this->email = $user["EMAIL"];
        $this->id = $user["ID"];

    }
}
