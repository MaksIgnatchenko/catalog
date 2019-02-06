<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.02.19
 *
 */

namespace App\Modules\Visitors\Services\SearchCompanies\Implementations;

use App\Modules\Companies\Models\Company;
use App\Modules\Visitors\Services\SearchCompanies\Interfaces\SearchCompaniesServiceInterface;
use Illuminate\Pagination\Paginator;

class SearchCompaniesByFilterService implements SearchCompaniesServiceInterface
{
    /**
     * @var int|null
     */
    private $country;

    /**
     * @var int|null
     */
    private $city;

    /**
     * @var int|null
     */
    private $category;

    /**
     * @var int|null
     */
    private $speciality;

    /**
     * @var int|null
     */
    private $type;

    /**
     * @var array
     */
    private $filters;

    /**
     * @var int
     */
    private $resultsPerPage;

    /**
     * @param array $data
     * @param int $resultsPerPage
     * @return mixed|void
     */
    public function __construct(array $data, int $resultsPerPage)
    {
        $this->country = $data['country'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->category = $data['category'] ?? null;
        $this->speciality = $data['speciality'] ?? null;
        $this->type = $data['type'] ?? null;
        $this->resultsPerPage = $resultsPerPage;
        $this->filters = $this->getFilters();
    }

    /**
     * @return Paginator
     */
    public function search(): Paginator
    {
        $companies = Company::active()
            ->where($this->filters)
            ->simplePaginate($this->resultsPerPage);
        return $companies;
    }

    /**
     * @return array
     */
    private function getFilters() : array
    {
        $filters = [];
        if ($this->country) {
            $filters[] = ['country_id', $this->country];
        }
        if ($this->city) {
            $filters[] = ['city_id', $this->city];
        }
        if ($this->category) {
            $filters[] = ['category_id', $this->category];
        }
        if ($this->speciality) {
            $filters[] = ['speciality_id', $this->speciality];
        }
        if ($this->type) {
            $filters[] = ['type_id', $this->type];
        }
        return $filters;
    }
}