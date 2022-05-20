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
            ["ID", "IBLOCK_ID", "NAME", "PROPERTY_*"],
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
            ["ID", "IBLOCK_ID", "NAME", "PROPERTY_*"],
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
    /**
     * Get sections
     *
     * @param integer $sectionId
     * @param array $filter
     * @param array $select
     * @return array
     */
    public function navigationChain(int $sectionId, array $filter = [], array $select = []): array
    {
        $iterator = \CIBlockSection::GetNavChain(false, $sectionId);

        while ($item = $iterator->GetNext())
            $result[] = $item;

        return $result ?? [];
    }
    /**
     * Get pictute by id
     *
     * @param int id
     * @return string|boolean
     */
    public function pictureSrcById(int $id): string|bool
    {
        $iterator = \CFile::GetByID($id);

        if($pic = $iterator->Fetch())
            $result = \CFile::GetPath($pic);

        return $result ?? false;
    }
}
