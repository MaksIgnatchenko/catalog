<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\DTO;

use App\Modules\Companies\Models\Company;
use App\Modules\Messages\Enums\MessagePurposeEnum;
use App\Modules\Messages\Enums\MessageTypeEnum;

class CreateMessageDTO
{
    /**
     * @var int|null
     */
    private $recipientId;

    /**
     * CreateMessageDTO constructor.
     * @param int|null $id
     */
    public function __construct(int $id = null)
    {
        $this->recipientId = $id;
    }

    /**
     * @return int
     */
    public function getRecipientId() : int
    {
        return $this->recipientId;
    }

    /**
     * @return array
     */
    public function getMessageTypes() : array
    {
        return MessageTypeEnum::getAvailable();
    }

    /**
     * @return array
     */
    public function getCompaniesList() : array
    {
        return Company::all(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();
    }

    /**
     * @return array
     */
    public function getPurposesList() : array
    {
        return array_combine(MessagePurposeEnum::getAvailable(), MessagePurposeEnum::getAvailable());
    }
}