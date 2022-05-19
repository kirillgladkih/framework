<?php

namespace App\Helpers;

class IBlockHelper
{
    public function __construct()
    {
        \CModule::IncludeModule("iblock");
    }
    /**
     * Get all
     *
     * @param integer $iblockId
     * @param array $filter
     * @param array $select
     * @return array
     */
    public function all(int $iblockId, array $filter = [], array $select = []): array
    {
        $result = [];

        $select = array_merge(
            ["ID", "IBLOCK_ID", "NAME","PROPERTY_*"],
            $select
        );

        $filter = array_merge(
            ["IBLOCK_ID" => $iblockId],
            $filter
        );

        $iterator = \CIBlockElement::GetList([], $filter, false, [], $select);

        while ($element = $iterator->GetNextElement(false, false))
            $result[] = [
                "fields" => $element->GetFields(),
                "properties" => $element->GetProperties()
            ];

        return $result;
    }
    /**
     * Get by id
     *
     * @param integer $iblockId
     * @param integer $elementId
     * @param array $filter
     * @param array $select
     * @return array
     */
    public function byId(int $elementId, array $filter = [], array $select = []): array
    {
        $result = [];

        $select = array_merge(
            ["ID", "IBLOCK_ID", "NAME","PROPERTY_*"],
            $select
        );

        $filter = array_merge(
            [
                "ID" => $elementId
            ],
            $filter
        );

        $iterator = \CIBlockElement::GetList([], $filter, false, [], $select);

        if ($element = $iterator->GetNextElement(false, false))
            $result = [
                "fields" => $element->GetFields(),
                "properties" => $element->GetProperties()
            ];

        return $result;
    }
}
