<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\DTO;

use App\Modules\Messages\Helpers\SenderPrettyTypeName;
use App\Modules\Messages\Models\Message;

class ShowMessageDTO
{
    /**
     * @var Message
     */
    private $message;

    /**
     * ShowMessageDTO constructor.
     * @param Message $message
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getSenderType() : string
    {
        return SenderPrettyTypeName::transform($this->message->senderable_type);
    }

    /**
     * @return string
     */
    public function getSenderName() : string
    {
        return $this->message->name ?? $this->message->senderable->name;
    }

    /**
     * @return string
     */
    public function getPurpose() : string
    {
        return $this->message->purpose;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->message->email ?? $this->message->senderable->email;
    }

    /**
     * @return string
     */
    public function getPhone() : string
    {
        return $this->message->phone ?? $this->message->senderable->getPhone();
    }

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message->message ?? '';
    }

    /**
     * @return string|null
     */
    public function getLinkToAttachedFile() : ?string
    {
        $fileName = $this->message->files()->first()->name ?? null;
        return '/storage/' . $fileName;
    }

}