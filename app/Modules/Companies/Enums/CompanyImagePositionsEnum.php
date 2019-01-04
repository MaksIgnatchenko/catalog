<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 04.01.19
 *
 */

namespace App\Modules\Companies\Enums;

class CompanyImagePositionsEnum
{
    public const LOGO = 'logo';
    public const COMPANY_IMAGE = 'company_image';
    public const TEAM_IMAGE = 'team_image';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::LOGO,
            self::COMPANY_IMAGE,
            self::TEAM_IMAGE,
        ];
    }
}
