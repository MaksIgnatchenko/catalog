<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Enums;

class CompanyImageTypeEnum
{
    public const COMPANY_IMAGE = 'company_image';
    public const TEAM_IMAGE = 'team_image';

    /**
     * @return array
     */
    public static function getAvailable() : array
    {
        return [
            self::COMPANY_IMAGE,
            self::TEAM_IMAGE,
        ];
    }

}