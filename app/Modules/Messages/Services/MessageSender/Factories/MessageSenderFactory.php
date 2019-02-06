<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Messages\Services\MessageSender\Factories;

use App\Modules\Admins\Models\Admin;
use App\Modules\Companies\Models\Company;
use App\Modules\Messages\Services\MessageSender\Implementations\BookingMessageSender;
use App\Modules\Messages\Services\MessageSender\Implementations\CommonMessageSender;
use App\Modules\Messages\Services\MessageSender\Implementations\VisitorToAdminMessageSender;
use App\Modules\Messages\Services\MessageSender\Interfaces\MessageSenderInterface;
use App\Modules\Messages\Services\MessageSender\Interfaces\Recipientable;
use App\Modules\Messages\Services\MessageSender\Interfaces\Senderable;
use App\Modules\Visitors\Model\Visitor;

class MessageSenderFactory
{
    /**
     * @param Senderable $sender
     * @param Recipientable $recipient
     * @param array $messageData
     * @return MessageSenderInterface
     */
    public static function getInstance(Senderable $sender, Recipientable $recipient, array $messageData) : MessageSenderInterface
    {
        if ($sender instanceof Visitor && $recipient instanceof Company) {
            return new BookingMessageSender($sender, $recipient, $messageData);
        }

        if ($sender instanceof Visitor && $recipient instanceof Admin) {
            return new VisitorToAdminMessageSender($sender, $recipient, $messageData);
        }

        return new CommonMessageSender($sender, $recipient, $messageData);
    }
}