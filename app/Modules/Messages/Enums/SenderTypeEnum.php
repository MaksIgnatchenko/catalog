<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\Enums;

class SenderTypeEnum
{
    public const ADMIN = 'admin';
    public const COMPANY = 'company';
    public const VISITOR = 'visitor';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::ADMIN,
            self::COMPANY,
            self::VISITOR,
        ];
    }
}