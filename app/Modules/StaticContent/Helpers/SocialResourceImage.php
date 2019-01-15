<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 09.12.18
 *
 */

namespace App\Modules\StaticContent\Helpers;

use App\Modules\StaticContent\Enums\SocialResourceEnum;
use App\Modules\StaticContent\Exceptions\InvalidSocialResourceException;

class SocialResourceImage
{
    /**
     * Get social resource image.
     *
     * @param string $socialResource
     * @return string
     * @throws InvalidSocialResourceException
     */
    public static function getUrl(string $socialResource)
    {
        switch ($socialResource) {
            case SocialResourceEnum::FACEBOOK :
                return asset('assets/socialLinks/facebook.svg');
            case SocialResourceEnum::GOOGLE_PLUS :
                return asset('assets/socialLinks/google-plus.svg');
            case SocialResourceEnum::INSTAGRAM :
                return asset('assets/socialLinks/instagram.svg');
            case SocialResourceEnum::LINKEDIN :
                return asset('assets/socialLinks/linkedin.svg');
            case SocialResourceEnum::TWITTER :
                return asset('assets/socialLinks/twitter.svg');
            case SocialResourceEnum::YOUTUBE :
                return asset('assets/socialLinks/youtube.svg');
            default :
                throw new InvalidSocialResourceException('Invalid social resource');
        }
    }
}