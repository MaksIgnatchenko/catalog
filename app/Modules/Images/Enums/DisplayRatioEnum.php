<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.01.19
 *
 */

namespace App\Modules\Images\Enums;


class DisplayRatioEnum
{
    public const FIRST = 1.33;
    public const SECOND = 1.5;
    public const THIRD = 1.66;
    public const FOURTH = 1.78;
    public const FIFTH = 2;
    public const SIXTH = 2.165;

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::FIRST,
            self::SECOND,
            self::THIRD,
            self::FOURTH,
            self::FIFTH,
            self::SIXTH
        ];
    }
}