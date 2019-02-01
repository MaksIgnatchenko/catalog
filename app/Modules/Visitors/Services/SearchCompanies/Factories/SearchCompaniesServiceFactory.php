<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.02.19
 *
 */

namespace App\Modules\Visitors\Services\SearchCompanies\Factories;


use App\Modules\Visitors\Services\SearchCompanies\Exceptions\IncorrectSearchCompaniesDataException;
use App\Modules\Visitors\Services\SearchCompanies\Implementations\SearchCompaniesByFilterService;
use App\Modules\Visitors\Services\SearchCompanies\Implementations\SearchCompaniesByWordService;
use App\Modules\Visitors\Services\SearchCompanies\Interfaces\SearchCompaniesServiceInterface;

class SearchCompaniesServiceFactory
{
    /**
     * @param array $data
     * @param int $resultsPerPage
     * @return SearchCompaniesServiceInterface
     * @throws IncorrectSearchCompaniesDataException
     */
    public static function getInstance(array $data, int $resultsPerPage) : SearchCompaniesServiceInterface
    {
        if (self::checkWordExistence($data)) {
            return new SearchCompaniesByWordService($data, $resultsPerPage);
        }

        if (self::checkFilterCriteria($data)) {
            return new SearchCompaniesByFilterService($data, $resultsPerPage);
        }

        throw new IncorrectSearchCompaniesDataException();
    }

    /**
     * @param array $data
     * @return bool
     */
    private static function checkWordExistence(array $data) : bool
    {
        return $data['search'] ?? false;
    }

    /**
     * @param array $data
     * @return bool
     */
    private static function checkFilterCriteria(array $data) : bool
    {
        $country = $data['country'] ?? null;
        $city = $data['city'] ?? null;
        $category = $data['category'] ?? null;
        $speciality = $data['speciality'] ?? null;
        $type = $data['type'] ?? null;
        return ($country || ($country && $city))
            || (($category)
                || ($category && $speciality)
                || ($category && $speciality && $type)
            );
    }
}