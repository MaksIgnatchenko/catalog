<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Files\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'fileable_id',
        'fileable_type',
    ];

    /**
     * Get all of the owning fileable models.
     */
    public function fileable()
    {
        return $this->morphTo();
    }

    public function delete()
    {
        Storage::delete($this->name);
        return parent::delete();
    }
}