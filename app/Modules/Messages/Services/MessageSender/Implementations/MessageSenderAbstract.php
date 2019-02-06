<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Messages\Services\MessageSender\Implementations;

use App\Modules\Messages\Services\MessageSender\Interfaces\MessageSenderInterface;
use App\Modules\Messages\Services\MessageSender\Interfaces\Recipientable;
use App\Modules\Messages\Services\MessageSender\Interfaces\Senderable;

abstract class MessageSenderAbstract implements MessageSenderInterface
{
    /**
     * @var Senderable
     */
    protected $sender;

    /**
     * @var Recipientable
     */
    protected $recipient;

    /**
     * @var array
     */
    protected $messageData;

    /**
     * MessageSenderAbstract constructor.
     * @param Senderable $sender
     * @param Recipientable $recipient
     * @param array $messageData
     */
    public function __construct(Senderable $sender, Recipientable $recipient, array $messageData)
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->messageData = $messageData;
    }
}