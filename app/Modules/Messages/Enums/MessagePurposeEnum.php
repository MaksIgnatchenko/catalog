<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\Enums;

class MessagePurposeEnum
{
    public const ADVERTISING = 'advertising';
    public const MARKETING = 'marketing';
    public const OTHER = 'other';
    public const BOOKING = 'booking';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::ADVERTISING,
            self::MARKETING,
            self::OTHER,
        ];
    }

    /**
     * @return array
     */
    public static function getAvailableForBooking() : array
    {
        return [
            self::BOOKING,
        ];
    }
}