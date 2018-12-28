<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Enums;

class CompanyEditOperationsEnum
{
    public const CHANGE_STATUS = 'change_status';
    public const OTHER = 'other';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::CHANGE_STATUS,
            self::OTHER,
        ];
    }

}