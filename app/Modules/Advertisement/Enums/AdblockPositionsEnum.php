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
<<<<<<< HEAD
    public static function getPositions(string $adBlockType) : array
=======
    public static function getPositions(string $adBlockType = null) : array
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
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
<<<<<<< HEAD
        }
    }
}
=======
            default :
                return [];
        }
    }
}
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
