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
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $speciality;

    /**
     * @var string
     */
    private $type;

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
        $this->country = $data['country'] ?? '';
        $this->city = $data['city'] ?? '';
        $this->category = $data['category'] ?? '';
        $this->speciality = $data['speciality'] ?? '';
        $this->type = $data['type'] ?? '';
        $this->resultsPerPage = $resultsPerPage;
    }

    /**
     * @return Paginator
     */
    public function search(): Paginator
    {
        $companies = Company::whereHas('country', function ($query) {
            $query->where('name', 'like', "%{$this->country}%");
        })
            ->orWhereHas('city', function ($query) {
                $query->where('name', 'like', "%{$this->city}%");
            })
            ->orWhereHas('category', function ($query) {
                $query->where('name', 'like', "%{$this->category}%");
            })
            ->orWhereHas('speciality', function ($query) {
                $query->where('name', 'like', "%{$this->speciality}%");
            })
            ->orWhereHas('type', function ($query) {
                $query->where('name', 'like', "%{$this->type}%");
            })
            ->simplePaginate($this->resultsPerPage);
        return $companies;
    }
}