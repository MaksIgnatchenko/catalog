<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Advertisement\Enums;

class AdblockPositionsEnum
{
    public const BACKGROUND = 'Background';
    public const LEFT = 'Left';
    public const TOP = 'Top';

    /**
     * @param string $adBlockType
     * @return array
     */
    public static function getPositions(string $adBlockType) : array
    {
        switch ($adBlockType) {
            case AdblockTypesEnum::DYNAMIC :
                return [
                    self::TOP,
                ];
            case AdblockTypesEnum::STATIC :
                return [
                    self::BACKGROUND,
                    self::LEFT,
                ];
        }
    }
}