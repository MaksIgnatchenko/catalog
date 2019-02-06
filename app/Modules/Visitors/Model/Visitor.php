<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Visitors\Model;

use App\Modules\Messages\Models\Message;
use App\Modules\Messages\Services\MessageSender\Interfaces\Recipientable;
use App\Modules\Messages\Services\MessageSender\Interfaces\Senderable;
use App\Modules\Visitors\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Visitor extends Authenticatable implements Senderable, Recipientable, MustVerifyEmail
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visitors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Get all of the visitors messages.
     */
    public function outgoingMessages()
    {
        return $this->morphMany(Message::class, 'senderable');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }


}