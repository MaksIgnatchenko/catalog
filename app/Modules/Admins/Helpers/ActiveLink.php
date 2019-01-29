<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Helpers;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Http\Controllers\CategoryController;
use App\Modules\Admins\Http\Controllers\DashboardController;
use App\Modules\Admins\Http\Controllers\SpecialityController;
use App\Modules\Admins\Http\Controllers\TypeController;
use App\Modules\Advertisement\Http\Controllers\AdblockController;
use App\Modules\Companies\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Modules\Companies\Http\Controllers\Company\CompanyController;
use App\Modules\Companies\Http\Controllers\Company\CompanyOwnerController;
use App\Modules\Messages\Http\Company\Controllers\IncomingMessagesController;
use App\Modules\Messages\Http\Company\Controllers\OutgoingMessagesController;
use App\Modules\Messages\Http\Controllers\IncomingMessagesControllerAbstract;
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
	public static function checkAdminCompany(): bool
	{
		$controller = self::getControllerInstance();

		return $controller instanceof AdminCompanyController;
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
     * @return bool
     */
    public static function checkCompany() : bool
    {
        return self::getControllerInstance() instanceof CompanyController;
    }

    /**
     * @return bool
     */
    public static function checkAccount() : bool
    {
        return self::getControllerInstance() instanceof CompanyOwnerController;
    }

    /**
     * @return bool
     */
    public static function checkCompanyIncomingMessagesController() : bool
    {
        return self::getControllerInstance() instanceof IncomingMessagesController;
    }

    /**
     * @return bool
     */
    public static function checkCompanyOutgoingMessagesController() : bool
    {
        return self::getControllerInstance() instanceof OutgoingMessagesController;
    }

    /**
     * @return bool
     */
    public static function checkCompanyMessages(): bool
    {
        return self::checkCompanyIncomingMessagesController() ||
            self::checkCompanyOutgoingMessagesController();
    }

    /**
     * @return bool
     */
    public static function checkAdminIncomingMessagesController() : bool
    {
        return self::getControllerInstance() instanceof \App\Modules\Messages\Http\Admin\Controllers\IncomingMessagesController;
    }

    /**
     * @return bool
     */
    public static function checkAdminOutgoingMessagesController() : bool
    {
        return self::getControllerInstance() instanceof \App\Modules\Messages\Http\Admin\Controllers\OutgoingMessagesController;
    }

    /**
     * @return bool
     */
    public static function checkAdminMessages(): bool
    {
        return self::checkAdminIncomingMessagesController() ||
            self::checkAdminOutgoingMessagesController();
    }


    /**
     * @return bool
     */
    public static function checkCompanyShow() : bool
    {
        return 'my-company.show' === self::getRouteName();
    }

    /**
     * @return bool
     */
    public static function checkCompanyEdit() : bool
    {
        return 'my-company.edit' === self::getRouteName();
    }

    /**
     * @return Controller
     */
    public static function getControllerInstance() : Controller
    {
        return Request::route()->getController();
    }

    /**
     * @return string
     */
    public static function getRouteName() : string
    {
        return Request::route()->getName();
    }
}
