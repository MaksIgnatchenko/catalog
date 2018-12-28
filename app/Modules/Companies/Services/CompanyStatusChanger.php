<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Services;

use App\Modules\Companies\Enums\CompanyStatusEnum;

class CompanyStatusChanger
{
    /**
     * @var mixed|null
     */
    private $status;

    /**
     * @var mixed|null
     */
    private $dateChangeStatus;

    /**
     * CompanyStatusChanger constructor.
     * @param array $changedAttributes
     */
    public function __construct(array $changedAttributes = [])
    {
        $this->status = $changedAttributes['status'] ?? null;
        $this->dateChangeStatus = $changedAttributes['date_change_status'] ?? null;
    }

    /**
     * @return array
     */
    public function getUpdatedData() : array
    {
        if ($this->getStatus() && $this->getDateChangeStatus()) {
            return [
                'status' => $this->getStatus(),
                'date_change_status' => $this->getDateChangeStatus(),
            ];
        }

        if ($this->getStatus() && !$this->getDateChangeStatus())
        return [
            'status' => $this->getStatus(),
        ];

        return [];
    }

    /**
     * @return string|null
     */
    private function getStatus() : ?string
    {
        if (
            CompanyStatusEnum::ACTIVE === $this->status &&
            $this->dateChangeStatus
        ) {
            return CompanyStatusEnum::WAITING_FOR_ACTIVATION;
        }

        if (
            CompanyStatusEnum::BLOCK === $this->status &&
            $this->dateChangeStatus
        ) {
            return CompanyStatusEnum::WAITING_FOR_BLOCK;
        }

        if (
            CompanyStatusEnum::ACTIVE === $this->status &&
            !$this->dateChangeStatus
        ) {
            return CompanyStatusEnum::ACTIVE;
        }

        if (
            CompanyStatusEnum::BLOCK === $this->status &&
            !$this->dateChangeStatus
        ) {
            return CompanyStatusEnum::BLOCK;
        }
        return null;
    }

    /**
     * @return string|null
     */
    private function getDateChangeStatus() : ?string
    {
        return $this->dateChangeStatus;
    }
}