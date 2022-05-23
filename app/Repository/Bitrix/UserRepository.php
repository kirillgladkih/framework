<?php

namespace App\Repository\Bitrix;

use App\Entities\Table\UserTable;
use App\Repository\Bitrix\ARepository;

class UserRepository extends ARepository
{
    protected function init()
    {
        $this->entity = UserTable::class;
    }
}
