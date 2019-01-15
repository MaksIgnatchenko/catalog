<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 09.12.18
 *
 */

namespace App\Modules\StaticContent\Models;

use App\Modules\StaticContent\Helpers\SocialResourceImage;
use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'social_links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_resource',
        'url',
        'alt',
    ];

    /**
     * @return string
     * @throws \App\Modules\StaticContent\Exceptions\InvalidSocialResourceException
     */
    public function getSocialIconAttribute()
    {
        return SocialResourceImage::getUrl($this->social_resource);
    }
}