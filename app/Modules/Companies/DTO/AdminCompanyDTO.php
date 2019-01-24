<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

namespace App\Modules\Companies\DTO;

use App\Modules\Companies\Enums\CompanyCaptureEnum;
use App\Modules\Companies\Services\WeekDays;
use App\Modules\StaticContent\Models\StaticContent;

class AdminCompanyDTO
{
    /**
     * @var array
     */
    private $countries;

    /**
     * @var array
     */
    private $categories;

    /**
     * @var array
     */
    private $statuses;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $defaultCompanyImagesLimit;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $defaultTeamImagesLimit;

    /**
     * @var
     */
    private $weekDays;

    /**
     * AdminCompanyDTO constructor.
     * @param array $countries
     * @param array $categories
     * @param array $statuses
     */
    public function __construct(array $countries, array $categories, array $statuses)
    {
        $this->countries = $countries;
        $this->categories = $categories;
        $this->statuses = $statuses;
        $this->defaultCompanyImagesLimit = config('company.default_company_images_limit');
        $this->defaultTeamImagesLimit = config('company.default_team_images_limit');
        $this->weekDays = (new WeekDays())->getDays();
    }

    /**
     * @param array $value
     * @return AdminCompanyDTO
     */
    public function setCountries(array $value) : self
    {
        $this->countries = $value;
        return $this;
    }

    /**
     * @param array $value
     * @return AdminCompanyDTO
     */
    public function setCategories(array $value) : self
    {
        $this->categories = $value;
        return $this;
    }

    /**
     * @param array $value
     * @return AdminCompanyDTO
     */
    public function setStatuses(array $value) : self
    {
        $this->statuses = $value;
        return $this;
    }

    /**
     * @return array]
     */
    public function getCountries() : array
    {
        return $this->countries;
    }

    /**
     * @return array
     */
    public function getCategories() : array
    {
        return $this->categories;
    }

    /**
     * @return array
     */
    public function getStatuses() : array
    {
        return $this->statuses;
    }

    /**
     * @return int
     */
    public function getDefaultCompanyImagesLimit() : int
    {
        return $this->defaultCompanyImagesLimit;
    }

    /**
     * @return int
     */
    public function getDefaultTeamImagesLimit() : int
    {
        return $this->defaultCompanyImagesLimit;
    }

    /**
     * @return array
     */
    public function getWeekDays() : array
    {
        return $this->weekDays;
    }

    /**
     * @return string
     */
    public function getDefaultOurCompanyCapture() : string
    {
        return CompanyCaptureEnum::OUR_COMPANY;
    }

    /**
     * @return string
     */
    public function getDefaultAboutAsCapture() : string
    {
        return CompanyCaptureEnum::ABOUT_AS;
    }

    /**
     * @return string
     */
    public function getDefaultOurServicesCapture() : string
    {
        return CompanyCaptureEnum::OUR_SERVICES;
    }

    /**
     * @return string
     */
    public function getDefaultOurTeamCapture() : string
    {
        return CompanyCaptureEnum::OUR_TEAM;
    }

    /**
     * @return string
     */
    public function getDefaultBookingAnAppointmentCapture() : string
    {
        return CompanyCaptureEnum::BOOKING_AN_APPOINTMENT;
    }

    /**
     * @return string
     */
    public function getTermsAndConditions() : string
    {
        return StaticContent::termsAndConditions()->active()->first()->payload ?? '';
    }

    /**
     * @return string
     */
    public function getPrivacyPolicy() : string
    {
        return StaticContent::privacyPolicy()->active()->first()->payload ?? '';
    }
}