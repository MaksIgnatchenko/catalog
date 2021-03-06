<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Helpers;

use App\Modules\Admins\Http\Controllers\CategoryController;
use App\Modules\Admins\Http\Controllers\DashboardController;
use App\Modules\Admins\Http\Controllers\SpecialityController;
use App\Modules\Admins\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Request;

class ActiveLink
{
    /**
     * @return bool
     */
    public static function checkDashboard(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof DashboardController;
    }

    /**
     * @return bool
     */
    public static function checkCategory(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof CategoryController;
    }

    /**
     * @return bool
     */
    public static function checkSpeciality(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof SpecialityController;
    }

    /**
     * @return bool
     */
    public static function checkType(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof TypeController;
    }

    /**
     * @return bool
     */
    public static function checkManagement(): bool
    {
        $controller = self::getControllerInstance();

        if ($controller instanceof CategoryController) {
            return true;
        }

        if ($controller instanceof SpecialityController) {
            return true;
        }

        if ($controller instanceof TypeController) {
            return true;
        }

        return false;
    }


    /**
     * @return mixed
     */
    public static function getControllerInstance()
    {
        return Request::route()->getController();
    }
}