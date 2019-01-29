<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 28.01.19
 *
 */

namespace App\Modules\Messages\Helpers;

use App\Modules\Admins\Models\Admin;
use App\Modules\Companies\Models\Company;

class SenderPrettyTypeName
{
    /**
     * @param string $className
     * @return string
     */
    public static function transform(string $className) : string
    {
        switch ($className) {
            case Admin::class :
                return 'Admin';
            case Company::class :
                return 'Company';
        }
    }

}