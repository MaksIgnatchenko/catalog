<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Visitors\Model;

use App\Modules\Messages\Models\Message;
use App\Modules\Messages\Services\MessageSender\Interfaces\Recipientable;
use App\Modules\Messages\Services\MessageSender\Interfaces\Senderable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class Visitor extends Authenticatable implements Senderable, Recipientable
{
    use LaratrustUserTrait;

    /**
     * Get all of the visitors messages.
     */
    public function outgoingMessages()
    {
        return $this->morphMany(Message::class, 'senderable');
    }
}