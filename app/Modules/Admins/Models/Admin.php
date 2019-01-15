<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'password',
        'email',
    ];

    /**
     * @param string $password
     */
    public function setPasswordAttribute(string $password = null): void
    {
        if ($password) {
            $this->attributes['password'] = Hash::make($password);
        }
    }

    /**
     * Scope a query to only include supervisors except superadmin.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSupervisors(Builder $query) : Builder
    {
        return $query->where('id', '>', 1);
    }
}

