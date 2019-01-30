<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\DTO;

use App\Modules\Messages\Services\MessageSender\Interfaces\Senderable;

class CreateAdminMessageDTO extends AbstractCreateMessageDTO
{
    /**
     * @var int|null
     */
    protected $recipientId;

    /**
     * CreateMessageDTO constructor.
     * @param Senderable $sender
     * @param int|null $id
     */
    public function __construct(Senderable $sender, int $id = null)
    {
        parent::__construct($sender);
        $this->recipientId = $id;
    }

    /**
     * @return int|null
     */
    public function getRecipientId() : ?int
    {
        return $this->recipientId ?? null;
    }

    /**
     * @return string|null
     */
    public function getSenderEmail() : ?string
    {
        return $this->sender->email ?? null;
    }

    /**
     * @return string
     */
    public function getSenderName() : string
    {
        return 'Admin';
    }
}