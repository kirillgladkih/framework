<?php

namespace App\Entities\Models\IBlock;

use App\Entities\Models\IBlock\Catalog\Material;
use App\Entities\Models\IBlock\Catalog\Suspension;
use App\Entities\Models\IBlock\Catalog\Trailer;
use App\Entities\Models\IBlock\Catalog\Wheel;
use App\Entities\Models\IBlock\Constructor\Configuration;
use App\Entities\Models\IBlock\Constructor\Element;
use Core\Models\IBlock\Model;

abstract class AConstructorModel extends Model
{
    /**
     * ID
     *
     * @var integer
     */
    public  $id;
    /**
     * Name
     *
     * @var string
     */
    public string $name;
    /**
     * Active
     *
     * @var string
     */
    public string $active;
    /**
     * Code
     *
     * @var mixed
     */
    public string $code;
    /**
     * Section
     *
     * @var string
     */
    public string $section;
    /**
     * Fields map
     *
     * @var array
     */
    protected static array $fieldsMap = [];
    /**
     * Props map
     *
     * @var array
     */
    protected static array $propMap = [];
    /**
     * Bootstrap
     *
     * @return void
     */
    protected function boot()
    {
        $this->bindCallback = function ($fields, $model){
            /**
             * Bind section
             */
            if($iblockSectionID = $fields["IBLOCK_SECTION_ID"]){

                $sectionArray = \CIBlockSection::GetByID($iblockSectionID)
                    ->Fetch();

                $model->bindValue("section", $sectionArray["NAME"] ?? "");


            }else{

                $model->bindValue("section", $fields["IBLOCK_NAME"] ?? "");

            }
        };
    }
    /**
     * Get fields map
     *
     * @return array
     */
    public function getFieldsMap(): array
    {
        $thisFieldsMap = [
            "NAME" => "name",
            "ID" => "id",
            "ACTIVE" => "active",
            "CODE" => "code"
        ];

        $fieldsMap = array_merge($thisFieldsMap, static::$fieldsMap);

        return $fieldsMap;
    }
    /**
     * Get Properties map
     *
     * @return array
     */
    public function getPropMap(): array
    {
        $thisPropMap = [];

        $propMap = array_merge($thisPropMap, static::$propMap);

        return $propMap;
    }
    /**
     * Get relations
     *
     * @return array
     */
    public static function relations(): array
    {
        return [
            "product" => AProductModel::iblocks()
        ];
    }
    /**
     * Iblock
     *
     * @return void
     */
    public static function iblocks(): array
    {
        return [
           Configuration::class => 15,
           Element::class => 16
        ];
    }
    /**
     * Get table name
     *
     * @return string
     */
    public static function tableName(): string
    {
        $class = static::class;

        $iblocks = static::iblocks();

        return $iblocks[$class] ?? "";
    }
}
