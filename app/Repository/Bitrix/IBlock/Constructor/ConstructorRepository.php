<?php

namespace App\Repository\Bitrix\IBlock\Constructor;

use App\Entities\Models\IBlock\AProductModel;
use App\Entities\Models\IBlock\Constructor\Element;

class ConstructorRepository
{
    public function all(): array
    {
        $elements = Element::all()->get();

        foreach($elements as $element){

            if(!is_null($element->product)){

                dd($element->getRelations());

            }

        }

        dd($elements);
        return $result ?? [];
    }
}
