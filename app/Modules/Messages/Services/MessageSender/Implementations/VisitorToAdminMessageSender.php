<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Messages\Services\MessageSender\Implementations;

use App\Modules\Messages\Models\Message;
use App\Modules\Visitors\Model\Visitor;

class VisitorToAdminMessageSender extends MessageSenderAbstract
{
    /**
     * Send message
     *
     */
    public function send() : void
    {
        $message = app()[Message::class];
        $message->fill($this->messageData);
        $message->recipientable_type = get_class($this->recipient);
        $message->senderable_type = Visitor::class;
        $message->senderable_id = $this->sender->id;
        $message->save();
    }
}