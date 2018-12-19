<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Advertisement\Models;

use App\Modules\Advertisement\Services\ImageService;
use App\Modules\Advertisement\Services\ImageSettings\ImageSettingsFactory;
use App\Modules\Geography\Models\GeographyCity;
use App\Modules\Geography\Models\GeographyCountry;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;

class Adblock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
        'url',
        'image',
        'country_id',
        'city_id',
        'position',
        'type',
        'appear_start',
        'appear_finish',
    ];

    /**
     * @return BelongsTo
     */
    public function country() : BelongsTo
    {
        return $this
            ->belongsTo(GeographyCountry::class)
            ->withDefault(['name' => 'All countries']);
    }

    /**
     * @return BelongsTo
     */
    public function city() : BelongsTo
    {
        return $this
            ->belongsTo(GeographyCity::class)
            ->withDefault(['name' => 'All cities']);
    }

    /**
     * @param int $value
     */
    public function setAppearFinishAttribute(int $value) : void
    {
        $appearFinish = Carbon::parse($this->appear_start)->addDays($value)->toDateTimeString();
        $this->attributes['appear_finish'] = $appearFinish;
    }

    public function setImageAttribute(UploadedFile $value) : void
    {
        $imageSettings = ImageSettingsFactory::getInstance($this->position);
        $imageService = new ImageService($value, $imageSettings);
        $this->attributes['image'] = $imageService->saveAndCrop($value, $imageSettings);
    }
}
