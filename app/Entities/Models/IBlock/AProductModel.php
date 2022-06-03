<?php

namespace App\Entities\Models\IBlock;

use Core\Models\IBlock\Model;
use App\Entities\Models\IBlock\Catalog\Wheel;
use App\Entities\Models\IBlock\Catalog\Trailer;
use App\Entities\Models\IBlock\Catalog\Material;
use App\Entities\Models\IBlock\Catalog\Suspension;

abstract class AProductModel extends Model
{
    public $id;
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
     * Base price
     *
     * @var float
     */
    public float $basePrice;
    /**
     * Base currency
     *
     * @var string
     */
    public string $baseCurrency;
    /**
     * Prop
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
             * Price arrray
             */
            $basePrice = \CPrice::GetBasePrice($fields["ID"]);
            /**
             * Bind base currency
             */
            $model->bindValue("baseCurrency", $basePrice["CURRENCY"]);
            /**
             * Bind base price
             */
            $model->bindValue("basePrice", (float) $basePrice["PRICE"]);
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
            "IBLOCK_ID" => "iblockId",
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
     * Iblock
     *
     * @return void
     */
    public static function iblocks(): array
    {
        return [
            Material::class => 22,
            Suspension::class => 22,
            Trailer::class => 25,
            Wheel::class => 24
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
