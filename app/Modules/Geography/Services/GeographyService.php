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

class GeographyService implements GeographyServiceInterface
{

    /**
     * @return GeographyCountry[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCountries(): Collection
    {
        return GeographyCountry::all();
    }

    /**
     * @return GeographyCountry[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getCountriesHaveCompanies(): Collection
    {
        return GeographyCountry::with('companies')->has('companies')->get();
    }

    /**
     * @param $id
     *
     * @return GeographyCountry
     */
    public function getCountryById($id): GeographyCountry
    {
        return GeographyCountry::findOrFail($id);
    }

    /**
     * @param int|null $countryId
     *
     * @return Collection
     */
    public function getStates(int $countryId = null): Collection
    {
        if ($countryId) {
            return GeographyState::where('country_id', $countryId)->with('cities')->get();
        }

        return GeographyState::all();
    }

    /**
     * @param int|null $stateId
     *
     * @return Collection
     */
    public function getCities(int $stateId = null): Collection
    {
        if ($stateId) {
            return GeographyCity::where('state_id', $stateId)->get();
        }

        return GeographyState::all();
    }

    public function getCitiesFromCountry(int $countryId, array $fields = []): Collection
    {
        $country = $this->getCountryById($countryId);
        return $country->cities()->get($fields);
    }

    /**
     * @param string   $name
     * @param int|null $stateId
     *
     * @return GeographyCity
     */
    public function getCityByName(string $name, int $stateId = null): GeographyCity
    {
        $cities = (new GeographyCity)->newQuery();

        if($stateId) {
            $cities->where('state_id', $stateId);
        }

        return $cities->where('name', $name)->firstOrFail();
    }

    /**
     * @param string $shortName
     *
     * @return GeographyCountry|null
     */
    public function getCountryByShortName(string $shortName): GeographyCountry
    {
        return GeographyCountry::where('sortname', $shortName)->firstOrFail();
    }

    /**
     * @param string   $name
     * @param int|null $countryId
     *
     * @return GeographyState
     */
    public function getStateByName(string $name, int $countryId = null): GeographyState
    {
        $states = (new GeographyState)->newQuery();

        if($states) {
            $states->where('country_id', $countryId);
        }

        return $states->where('name', $name)->firstOrFail();
    }
}
