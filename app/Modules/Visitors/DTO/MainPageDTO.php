<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.02.19
 *
 */

namespace App\Modules\Visitors\DTO;

class MainPageDTO
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
     * MainPageDTO constructor.
     * @param array $countries
     * @param array $categories
     */
    public function __construct(array $countries, array $categories)
    {
        $this->countries = $countries;
        $this->categories = $categories;
    }

    /**
     * @param array $value
     * @return MainPageDTO
     */
    public function setCountries(array $value) : self
    {
        $this->countries = $value;
        return $this;
    }

    /**
     * @param array $value
     * @return MainPageDTO
     */
    public function setCategories(array $value) : self
    {
        $this->categories = $value;
        return $this;
    }

    /**
     * @return array
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
}