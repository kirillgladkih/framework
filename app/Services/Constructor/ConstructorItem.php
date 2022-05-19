<?php

namespace App\Services\Constructor;

use App\Services\Mapping\ConstructorMap;
use App\Services\Constructor\Abstracts\AConstructorItem;

class ConstructorItem extends AConstructorItem
{
    /**
     * Init
     *
     * $data = [
     * ]
     *
     * @param array $data
     */
    public function __construct(array $item)
    {
        $data = ConstructorMap::prepare($item);

        $this->loadFromArray($data);
    }
    /**
     * Load from array
     *
     * @param array $data
     * @return void
     */
    protected function loadFromArray(array $data): void
    {
        $this->id = $data["id"];
        $this->name = $data["name"];
        $this->basic = $data["basic"];
        $this->checked = $data["checked"];
        $this->main = $data["main"];
        $this->basePrice = $data["basePrice"];
        $this->currency = $data["currency"];
    }
}
