<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Messages\Services\MessageSender\Implementations;

use App\Modules\Messages\Enums\MessagePurposeEnum;
use App\Modules\Messages\Models\Message;
use App\Modules\Visitors\Model\Visitor;

class BookingMessageSender extends MessageSenderAbstract
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
        $message->recipientable_id = $this->recipient->id;
        $message->senderable_type = Visitor::class;
        $message->purpose = MessagePurposeEnum::BOOKING;
        $this->sender->outgoingMessages()->save($message);
    }
}