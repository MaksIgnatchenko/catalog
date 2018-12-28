<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 17.10.2018
 *
 */

namespace App\Modules\Companies\Helpers;

use App\Modules\Companies\Enums\CompanyStatusEnum;

class CheckCompanyStatus
{
    /**
     * @param string $status
     * @return bool
     */
    public static function isActive(string $status) : bool
    {
        return CompanyStatusEnum::ACTIVE === $status;
    }

    /**
     * @param string $status
     * @return bool
     */
    public static function isBlock(string $status) : bool
    {
        return CompanyStatusEnum::BLOCK === $status;
    }

    /**
     * @param string $status
     * @return bool
     */
    public static function isWaitingForActivation(string $status) : bool
    {
        return CompanyStatusEnum::WAITING_FOR_ACTIVATION === $status;
    }

    /**
     * @param string $status
     * @return bool
     */
    public static function isWaitingForBlock(string $status) : bool
    {
        return CompanyStatusEnum::WAITING_FOR_BLOCK === $status;
    }
}