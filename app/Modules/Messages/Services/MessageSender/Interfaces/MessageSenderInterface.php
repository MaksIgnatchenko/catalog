<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Messages\Services\MessageSender\Interfaces;

interface MessageSenderInterface
{
    /**
     * MessageSenderInterface constructor.
     * @param Senderable $sender
     * @param Recipientable $recipient
     * @param array $messageData
     */
    public function __construct(Senderable $sender, Recipientable $recipient, array $messageData);
}