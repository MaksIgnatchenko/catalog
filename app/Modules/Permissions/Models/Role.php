<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.18
 *
 */

namespace App\Modules\Permissions\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @param string $name
     */
    public function setNameAttribute(string $name): void
    {
        $this->attributes['display_name'] = $name;
        $this->attributes['name'] = strtolower(
            str_replace(' ', '_', $name)
        );
    }

}
