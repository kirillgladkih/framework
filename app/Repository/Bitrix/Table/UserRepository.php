<?php

namespace App\Repository\Bitrix\Table;

use App\Entities\Table\UserTable;

class UserRepository extends ARepository
{
    protected function init()
    {
        $this->entity = UserTable::class;
    }
}
