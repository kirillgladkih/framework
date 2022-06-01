<?php

namespace App\Entities\Table;

use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;
use Bitrix\Main\ORM\Data\DataManager;

class UserTable extends DataManager
{
    /**
     * Get table name
     *
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_user';
    }
    /**
     * Get map
     *
     * @return array
     */
    public static function getMap(): array
    {
        return [
            /**
             * ID
             */
            (new IntegerField("ID"))
                ->configurePrimary()
				    ->configureAutocomplete(),
            /**
             * LOGIN
             */
            new StringField("LOGIN"),
            /**
             * NAME
             */
			new StringField('NAME'),
            /**
             * EMAIL
             */
			new StringField('EMAIL'),
            /**
             * PASSWORD
             */
			new StringField('PASSWORD')
        ];
    }
}
