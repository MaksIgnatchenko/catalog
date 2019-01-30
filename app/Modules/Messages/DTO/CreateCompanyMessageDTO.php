<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\DTO;


class CreateCompanyMessageDTO extends AbstractCreateMessageDTO
{
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
        return $this->sender->companyOwner->email ?? null;
    }

    /**
     * @return string
     */
    public function getSenderName() : string
    {
        return $this->sender->name;
    }

    /**
     * @return string
     */
    public function getSenderPhone() : string
    {
        return $this->sender->phones[0] ??
            $this->sender->phones[1] ??
            $this->sender->phones[2];
    }
}