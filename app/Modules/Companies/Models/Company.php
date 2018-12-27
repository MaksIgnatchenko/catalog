<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Models;

use App\Modules\Admins\Models\Category;
use App\Modules\Admins\Models\Speciality;
use App\Modules\Admins\Models\Type;
use App\Modules\Companies\Enums\CompanyStatusEnum;
use App\Modules\Geography\Models\GeographyCity;
use App\Modules\Geography\Models\GeographyCountry;
use App\Modules\Images\Models\Image;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Company extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
        'city_id',
        'category_id',
        'speciality_id',
        'type_id',
        'logo',
        'company_images_limit',
        'team_images_limit',
        'date_change_status',
        'status',
        'email',
        'password',
    ];

    /**
     * @return MorphMany
     */
    public function images() : MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality() : BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()  : BelongsTo
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * @return BelongsTo
     */
    public function country()  : BelongsTo
    {
        return $this->belongsTo(GeographyCountry::class);
    }

    /**
     * @return BelongsTo
     */
    public function city()  : BelongsTo
    {
        return $this->belongsTo(GeographyCity::class);
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWaitingForActivation(Builder $query) : Builder
    {
        return $query->where('status', CompanyStatusEnum::WAITING_FOR_ACTIVATION);
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWaitingForBlock(Builder $query) : Builder
    {
        return $query->where('status', CompanyStatusEnum::WAITING_FOR_BLOCK);
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeChangeStatusToday(Builder $query) : Builder
    {
        return $query->where('date_change_status', Carbon::today()->toDateString());
    }
}

