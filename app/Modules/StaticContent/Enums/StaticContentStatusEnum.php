<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Enums;

class StaticContentStatusEnum
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