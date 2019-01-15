<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 09.12.18
 *
 */

namespace App\Modules\StaticContent\Enums;

class SocialResourceEnum
{
    public const FACEBOOK = 'facebook';
    public const GOOGLE_PLUS = 'google_plus';
    public const LINKEDIN = 'linkedin';
    public const YOUTUBE = 'youtube';
    public const TWITTER = 'twitter';
    public const INSTAGRAM = 'instagram';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::FACEBOOK,
            self::GOOGLE_PLUS,
            self::LINKEDIN,
            self::YOUTUBE,
            self::TWITTER,
            self::INSTAGRAM
        ];
    }
}