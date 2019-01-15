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
use App\Modules\Advertisement\Http\Controllers\AdblockController;
use App\Modules\Companies\Http\Controllers\Admin\CompanyController;
use App\Modules\Permissions\Http\Controllers\RoleController;
use App\Modules\StaticContent\Http\Controllers\HelpController;
use App\Modules\StaticContent\Http\Controllers\OurVisionController;
use App\Modules\StaticContent\Http\Controllers\PrivacyPolicyController;
use App\Modules\StaticContent\Http\Controllers\SocialLinkController;
use App\Modules\StaticContent\Http\Controllers\TermController;
use App\Modules\StaticContent\Http\Controllers\WhoWeAreController;
use App\Modules\Supervisors\Http\Controllers\SupervisorController;
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
        return self::checkCategory() ||
            self::checkSpeciality() ||
            self::checkType();
    }

    /**
     * @return bool
     */
    public static function checkAdblock(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof AdblockController;
    }

	/**
	 * @return bool
	 */
	public static function checkCompany(): bool
	{
		$controller = self::getControllerInstance();

		return $controller instanceof CompanyController;
	}

    /**
     * @return bool
     */
    public static function checkRole(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof RoleController;
    }

    /**
     * @return bool
     */
    public static function checkSupervisor(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof SupervisorController;
    }

    /**
     * @return bool
     */
    public static function checkWhoWeAre(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof WhoWeAreController;
    }

    /**
     * @return bool
     */
    public static function checkOurVision(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof OurVisionController;
    }

    /**
     * @return bool
     */
    public static function checkHelp(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof HelpController;
    }

    /**
     * @return bool
     */
    public static function checkTerm(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof TermController;
    }

    /**
     * @return bool
     */
    public static function checkPrivacyPolicy(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof PrivacyPolicyController;
    }

    /**
     * @return bool
     */
    public static function checkSocialLink(): bool
    {
        $controller = self::getControllerInstance();

        return $controller instanceof SocialLinkController;
    }

    /**
     * @return bool
     */
    public static function checkStaticContent(): bool
    {
        return self::checkWhoWeAre() ||
            self::checkOurVision() ||
            self::checkTerm() ||
            self::checkPrivacyPolicy() ||
            self::checkHelp() ||
            self::checkSocialLink();
    }

    /**
     * @return mixed
     */
    public static function getControllerInstance()
    {
        return Request::route()->getController();
    }
}
