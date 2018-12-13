<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Advertisement\Enums;

class AdblockTypesEnum
{
    public const DYNAMIC = 'dynamic';
    public const STATIC = 'static';

    /**
     * @return array
     */
    public static function getPositions() : array
    {
        return [
            self::DYNAMIC,
            self::STATIC,
        ];
    }
}