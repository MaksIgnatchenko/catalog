<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 30.01.19
 *
 */

namespace App\Modules\Messages\DTO;


use App\Modules\Messages\Enums\MessagePurposeEnum;
use App\Modules\Messages\Services\MessageSender\Interfaces\Senderable;

abstract class AbstractCreateMessageDTO
{
    /**
     * @var Senderable
     */
    protected $sender;

    /**
     * AbstractCreateMessageDTO constructor.
     * @param Senderable $sender
     */
    public function __construct(Senderable $sender)
    {
        $this->sender = $sender;
    }

    /**
     * @return int|null
     */
    public function getRecipientId() : ?int
    {
        return $this->recipientId ?? null;
    }

    /**
     * @return array
     */
    public function getPurposesList() : array
    {
        return array_combine(MessagePurposeEnum::getAvailable(), MessagePurposeEnum::getAvailable());
    }

    /**
     * @return string|null
     */
    abstract public function getSenderEmail() : ?string;
}