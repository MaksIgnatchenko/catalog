<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Models;

use Illuminate\Database\Eloquent\Model;

class GeographyCountry extends Model implements GeographyInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany(GeographyState::class);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->sortname;
    }

    public function cities()
    {
        return $this->hasManyThrough(GeographyCity::class, GeographyState::class, 'country_id', 'state_id',  'id', 'id');
    }
}