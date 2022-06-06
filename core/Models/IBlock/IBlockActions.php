<?php

namespace Core\Models\IBlock;

use CDBResult;
use Core\Models\Interfaces\IModelActions;

class IBlockActions implements IModelActions
{
    /**
     * Get default filter
     *
     * @return array
     */
    protected static function defaultElementFilter(): array
    {
        return [];
    }
    /**
     * Get default select
     *
     * @return array
     */
    protected static function defaultElementSelect(): array
    {
        $select =  [
            "ID",
            "TIMESTAMP_X",
            "MODIFIED_BY",
            "CREATED",
            "CREATED_DATE",
            "CREATED_BY",
            "IBLOCK_ID",
            "ACTIVE",
            "ACTIVE_FROM",
            "ACTIVE_TO",
            "SORT",
            "NAME",
            "SHOW_COUNTER",
            "SHOW_COUNTER_START",
            "CODE",
            "TAGS",
            "XML_ID",
            "STATUS",
            "SECTION_ID",
            "IBLOCK_SECTION_ID",
            "IBLOCK_NAME",
            "IBLOCK_CODE",
        ];

        return $select;
    }
    /**
     * Get list iterator
     *
     * @param array $filter
     * @param array $select
     * @param mixed $navStartParams
     * @param array $order
     * @param mixed $groupBy
     * @return \CDBResult
     */
    public static function listElement(
        array $filter,
        array $select = [],
        mixed $navStartParams = false,
        array $order = [],
        mixed $groupBy = false
    ): \CDBResult {

        $filter = array_unique(array_merge($filter, static::defaultElementFilter()));

        $select = array_unique(array_merge($select, static::defaultElementSelect()));

        return \CIBlockElement::GetList(
            $order,
            $filter,
            $groupBy,
            $navStartParams,
            $select
        );
    }
    /**
     * Get list iterator
     *
     * @param array $filter
     * @param array $select
     * @param mixed $navStartParams
     * @param array $order
     * @param mixed $groupBy
     * @return \CDBResult
     */
    public static function element(
        array $filter,
        array $select = [],
        mixed $navStartParams = false,
        array $order = [],
        mixed $groupBy = false
    ): \CDBResult {


        $filter = array_unique(array_merge($filter, static::defaultElementFilter()));

        $select = array_unique(array_merge($select, static::defaultElementSelect()));

        return \CIBlockElement::GetList(
            $order,
            $filter,
            $groupBy,
            $navStartParams,
            $select
        );
    }
}
