<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.01.2019
 *
 */

namespace App\Modules\Companies\DTO;

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

}