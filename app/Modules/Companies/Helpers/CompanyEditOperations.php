<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Helpers;

use App\Modules\Companies\Enums\CompanyEditOperationsEnum;
use App\Modules\Companies\Enums\CompanyStatusEnum;

class CompanyEditOperations
{
    /**
     * @param string|null $operation
     * @return string
     */
    public static function getViewName(string $operation = null) : string
    {
        if (CompanyEditOperationsEnum::CHANGE_STATUS === $operation) {
            return 'adminCompany.status_edit_fields';
        }
        return 'adminCompany.edit_fields';
    }

    /**
     * @param string|null $newStatus
     * @return string
     */
    public static function getHeader(string $newStatus = null) : string
    {
        if (CompanyStatusEnum::ACTIVE === $newStatus) {
            return 'Activate company';
        }
        if (CompanyStatusEnum::BLOCK === $newStatus) {
            return 'Block company';
        }
        return 'Edit company';
    }
}