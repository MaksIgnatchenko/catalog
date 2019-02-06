<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Models;

use App\Modules\Companies\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'testField',
    ];

    /**
     * @return HasMany
     */
    public function specialities() : HasMany
    {
        return $this->hasMany(Speciality::class);
    }

    /**
     * @return HasMany
     */
    public function companies() : HasMany
    {
        return $this->hasMany(Company::class, 'category_id');
    }
}