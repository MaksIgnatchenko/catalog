<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 21.01.19
 *
 */

namespace App\Modules\Companies\DTO;

use App\Helpers\FieldPrettyName;
use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Services\WeekDays;
use Illuminate\Support\Collection;

class MyCompanyEditDTO
{
    /**
     * @var Company
     */
    private $company;

    /**
     * @var array
     */
    private $countries;

    /**
     * @var array
     */
    private $categories;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $companyImagesLimit;

    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    private $teamImagesLimit;

    /**
     * @var
     */
    private $weekDays;

    /**
     * AdminCompanyDTO constructor.
     * @param Company $company
     * @param array $countries
     * @param array $categories
     */
    public function __construct(Company $company, array $countries, array $categories)
    {
        $this->company = $company;
        $this->countries = $countries;
        $this->categories = $categories;
        $this->companyImagesLimit = $this->company->company_images_limit;
        $this->teamImagesLimit = $this->company->team_images_limit;
        $this->weekDays = (new WeekDays())->getDays();
    }

    /**
     * @return string
     */
    public function getCompanyName() : string
    {
        return $this->company->name;
    }

    /**
     * @return int
     */
    public function getCompanyId() : int
    {
        return $this->company->id;
    }

    /**
     * @return array|null
     */
    public function getCompanyPhones() : ?array
    {
        return $this->company->phones;
    }

    /**
     * @return string
     */
    public function getCompanyWebsite() : string
    {
        return $this->company->website;
    }

    /**
     * @return string
     */
    public function getCompanyStatus() : string
    {
        return FieldPrettyName::transform($this->company->status);
    }

    /**
     * @return array]
     */
    public function getCountries() : array
    {
        return $this->countries;
    }

    /**
     * @return string
     */
    public function getCompanyCountryName() : string
    {
        return $this->company->country->name;
    }

    /**
     * @return int
     */
    public function getCompanyCountryId() : int
    {
        return $this->company->country->id;
    }

    /**
     * @return string
     */
    public function getCompanyCityName() : string
    {
        return $this->company->city->name;
    }

    /**
     * @return int
     */
    public function getCompanyCityId() : int
    {
        return $this->company->city->id;
    }

    /**
     * @return array
     */
    public function getCategories() : array
    {
        return $this->categories;
    }

    /**
     * @return int
     */
    public function getCompanyCategoryId() : int
    {
        return $this->company->category->id;
    }

    /**
     * @return int
     */
    public function getCompanySpecialityId() : int
    {
        return $this->company->speciality->id;
    }

    /**
     * @return int
     */
    public function getCompanyTypeId() : int
    {
        return $this->company->type->id;
    }

    /**
     * @return int
     */
    public function getCompanyImagesLimit() : int
    {
        return $this->companyImagesLimit;
    }

    /**
     * @return int
     */
    public function getTeamImagesLimit() : int
    {
        return $this->teamImagesLimit;
    }

    /**
     * @return null|string
     */
    public function getCompanyLogo() : ?string
    {
        return $this->company->logo;
    }

    /**
     * @return Collection
     */
    public function getCompanyImages() : Collection
    {
        return $this->company->companyImages;
    }

    /**
     * @return Collection
     */
    public function getTeamImages() : Collection
    {
        return $this->company->teamImages;
    }

    /**
     * @return string
     */
    public function getAboutUs() : string
    {
        return $this->company->about_us;
    }

    /**
     * @return string
     */
    public function getOurServices() : string
    {
        return $this->company->our_services;
    }

    /**
     * @return array
     */
    public function getWeekDays() : array
    {
        return $this->weekDays;
    }

    /**
     * @return float|null
     */
    public function getCompanyLatitude() : ?float
    {
        return $this->company->latitude;
    }

    /**
     * @return float|null
     */
    public function getCompanyLongitude() : ?float
    {
        return $this->company->longitude;
    }

    /**
     * @param string $day
     * @return bool
     */
    public function isWorkDay(string $day) : bool
    {
        if ($this->getCompanyWorkDays()[$day] ?? null) {
            return true;
        }
        return  false;
    }

    /**
     * @param string $day
     * @return null|string
     */
    public function getStartTimeForDay(string $day) : ?string
    {
        if ($daySchedule = $this->getCompanyWorkDays()[$day] ?? null) {
            return $daySchedule['from'];
        }
        return null;
    }

    /**
     * @param string $day
     * @return null|string
     */
    public function getEndTimeForDay(string $day) : ?string
    {
        if ($daySchedule = $this->getCompanyWorkDays()[$day] ?? null) {
            return $daySchedule['to'];
        }
        return null;
    }

    /**
     * @return array
     */
    private function getCompanyWorkDays() : array
    {
        return $this->company->work_days;
    }
}
