<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Admins\Enums;

class BannerPositionsEnum
{
    public const BACKGROUND = 'Background';
    public const LEFT = 'Left';
    public const TOP = 'Top';

    /**
     * @return array
     */
    public static function getPositions() : array
    {
        return [
            self::BACKGROUND,
            self::LEFT,
            self::TOP,
        ];
    }
}