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
    public const WAITING_FOR_ACTIVATION = 'waiting_for_activation';
    public const WAITING_FOR_BLOCK = 'waiting_for_block';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::ACTIVE,
            self::BLOCK,
            self::WAITING_FOR_ACTIVATION,
            self::WAITING_FOR_BLOCK,
        ];
    }

    /**
     * @return array
     */
    public  static function getActiveStatuses() : array
    {
        return [
            self::ACTIVE,
            self::WAITING_FOR_BLOCK,
        ];
    }

    /**
     * @return array
     */
    public static function getBasicStatuses() : array
    {
        return [
            self::ACTIVE,
            self::BLOCK,
        ];
    }
}