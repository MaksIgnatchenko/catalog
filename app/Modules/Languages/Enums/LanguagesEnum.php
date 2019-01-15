<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 02.01.19
 *
 */

namespace App\Modules\Languages\Enums;

class LanguagesEnum
{
    public const ENGLISH = 'en';
    public const ARABIC = 'ar';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::ENGLISH,
            self::ARABIC,
        ];
    }
}