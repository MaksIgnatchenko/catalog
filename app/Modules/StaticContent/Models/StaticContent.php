<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 26.12.18
 *
 */

namespace App\Modules\StaticContent\Models;

use App\Modules\StaticContent\Enums\ContentTypeEnum;
use App\Modules\StaticContent\Enums\StaticContentStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StaticContent extends Model
{
    use HasTranslations;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'static_content';

    /**
     * Fields for translate.
     *
     * @var array
     */
    public $translatable = [
        'payload',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payload',
        'content_type',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'payload' => 'array',
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query) : Builder
    {
        return $query->where('status',StaticContentStatusEnum::ACTIVE);
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWhoWeAre(Builder $query) : Builder
    {
        return $query->where('content_type',ContentTypeEnum::WHO_WE_ARE);
    }

    /**
     * Check is status active.
     *
     * @return bool
     */
    public function isActive() : bool
    {
        if (StaticContentStatusEnum::ACTIVE === $this->status) {
            return true;
        }

        return false;
    }
}
