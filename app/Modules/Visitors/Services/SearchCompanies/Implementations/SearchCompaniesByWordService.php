<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.02.19
 *
 */

namespace App\Modules\Visitors\Services\SearchCompanies\Implementations;

use App\Modules\Companies\Models\Company;
use App\Modules\Visitors\Services\SearchCompanies\Interfaces\SearchCompaniesServiceInterface;
use Illuminate\Pagination\Paginator;

class SearchCompaniesByWordService implements SearchCompaniesServiceInterface
{
    /**
     * @var string|null
     */
    private $word;

    /**
     * @var int
     */
    private $resultsPerPage;

    /**
     * SearchCompaniesByWordService constructor.
     * @param array $data
     * @param int $resultsPerPage
     */
    public function __construct(array $data, int $resultsPerPage)
    {
        $this->word = $data['search'];
        $this->resultsPerPage = $resultsPerPage;
    }

    /**
     * @return Paginator
     */
    public function search(): Paginator
    {
        $companies = Company::whereHas('country', function ($query) {
            $query->where('name', 'like', "%{$this->word}%");
        })
            ->orWhereHas('city', function ($query) {
                $query->where('name', 'like', "%{$this->word}%");
            })
            ->orWhereHas('category', function ($query) {
                $query->where('name', 'like', "%{$this->word}%");
            })
            ->orWhereHas('speciality', function ($query) {
                $query->where('name', 'like', "%{$this->word}%");
            })
            ->orWhereHas('type', function ($query) {
                $query->where('name', 'like', "%{$this->word}%");
            })
            ->simplePaginate($this->resultsPerPage);

        return $companies;
    }

}