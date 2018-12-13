<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Services;

use App\Modules\Geography\Models\GeographyCity;
use App\Modules\Geography\Models\GeographyCountry;
use App\Modules\Geography\Models\GeographyState;
use Illuminate\Database\Eloquent\Collection;

interface GeographyServiceInterface
{
    /**
     * @return Collection
     */
    public function getCountries(): Collection;

    /**
     * @param $id
     *
     * @return GeographyCountry
     */
    public function getCountryById($id): GeographyCountry;

    /**
     * @param int|null $countryId
     *
     * @return Collection
     */
    public function getStates(int $countryId = null): Collection;

    /**
     * @param int|null $stateId
     *
     * @return Collection
     */
    public function getCities(int $stateId = null): Collection;

    /**
     * @param int|null $countryId
     *
     * @return Collection
     */
    public function getCitiesFromCountry(int $countryId, array $fields = []): Collection;

    /**
     * @param string $shortName
     *
     * @return GeographyCountry|null
     */
    public function getCountryByShortName(string $shortName): GeographyCountry;

    /**
     * @param string   $name
     * @param int|null $countryId
     *
     * @return GeographyState
     */
    public function getStateByName(string $name, int $countryId = null): GeographyState;

    /**
     * @param string   $name
     * @param int|null $stateId
     *
     * @return GeographyCity
     */
    public function getCityByName(string $name, int $stateId = null): GeographyCity;

}