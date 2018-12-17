<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.12.2018
 *
 */

namespace App\Modules\Companies\Enums;

class CompanyStatusEnum
{

    public const ACTIVE = 'active';
    public const BLOCK = 'block';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::ACTIVE,
            self::BLOCK,
        ];
    }
}