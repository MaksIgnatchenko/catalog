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
use App\Modules\Companies\Enums\CompanyImagePositionsEnum;
use App\Modules\Geography\Models\GeographyCity;
use App\Modules\Geography\Models\GeographyCountry;
use App\Modules\Images\Models\Image;
use App\Modules\Images\Services\ImageService;
use App\Modules\Images\Services\ImageSettings\ImageSettingsFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;

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
        'company_image',
        'company_team_image',
        'company_images_limit',
        'team_images_limit',
        'date_change_status',
        'status',
        'email',
        'password',
        'latitude',
        'longitude',
        'about_us',
        'our_services',
        'work_days',
        'website',
        'phones',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'work_days' => 'array',
        'phones' => 'array',
    ];

    public $images;


    public function setCompanyImageAttribute(array $value)
    {
        $this->images[CompanyImagePositionsEnum::COMPANY_IMAGE] = $value;
    }

    public function setCompanyTeamImageAttribute(array $value)
    {
        $this->images[CompanyImagePositionsEnum::TEAM_IMAGE] = $value;
    }

    /**
     * @param UploadedFile $value
     */
    public function setLogoAttribute(UploadedFile $value) : void
    {
        $imageSettings = ImageSettingsFactory::getInstance(CompanyImagePositionsEnum::LOGO);
        $imageService = new ImageService($value, $imageSettings);
        $this->attributes['logo'] = $imageService->getUrl();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCompanyImagesAttribute()
    {
        return $this->images()->where('type', CompanyImagePositionsEnum::COMPANY_IMAGE)->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getTeamImagesAttribute()
    {
        return $this->images()->where('type', CompanyImagePositionsEnum::TEAM_IMAGE)->get();
    }

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

