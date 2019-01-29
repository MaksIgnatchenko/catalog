<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Messages\Models;

use App\Modules\Admins\Models\Admin;
use App\Modules\Files\Models\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Message extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'senderable_id',
        'senderable_type',
        'recipientable_id',
        'recipientable_type',
        'purpose',
        'email',
        'phone',
        'referred_time',
        'message',
        'file',
    ];

    public $file;

    /**
     * Get all of the message's files.
     */
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    /**
     * Get all of the owning senderable models.
     */
    public function senderable()
    {
        return $this->morphTo();
    }

    /**
     * Get all of the owning recipientable models.
     */
    public function recipientable()
    {
        return $this->morphTo();
    }

    public function setFileAttribute(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * Scope a query to only include messages of a given type.
     *
     * @param Builder $query
     * @param int $id
     * @return Builder
     */
    public function scopeCompanyIncoming(Builder $query, int $id) : Builder
    {
        return $query->where('recipientable_id', $id);
    }

    /**
     * Scope a query to only include messages of a given type.
     *
     * @param Builder $query
     * @param int $id
     * @return Builder
     */
    public function scopeCompanyOutgoing(Builder $query, int $id) : Builder
    {
        return $query->where('senderable_id', $id);
    }

    /**
     * Scope a query to only include messages of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdminIncoming(Builder $query) : Builder
    {
        return $query->where('recipientable_type', Admin::class);
    }

    /**
     * Scope a query to only include messages of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAdminOutgoing(Builder $query) : Builder
    {
        return $query->where('senderable_type', Admin::class);
    }
}