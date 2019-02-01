<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.01.19
 *
 */

namespace App\Modules\Visitors\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Category;
use App\Modules\Companies\DTO\AdminCompanyDTO;
use App\Modules\Companies\Models\Company;
use App\Modules\Geography\Services\GeographyServiceInterface;
use App\Modules\Visitors\Services\SearchCompanies\Factories\SearchCompaniesServiceFactory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSearchForm()
    {
        $geographyService = app()[GeographyServiceInterface::class];
        $countries = $geographyService
            ->getCountriesHaveCompanies()
            ->pluck('name', 'id')
            ->toArray();
        $categories = Category::all(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();
        $dto = new AdminCompanyDTO($countries, $categories, []);
        return view('search', ['dto' => $dto]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Modules\Visitors\Services\SearchCompanies\Exceptions\IncorrectSearchCompaniesDataException
     */
    public function search(Request $request)
    {
        $companiesCountPerPage = config('app_config.companies_count_per_page');
        $searchCompaniesService = SearchCompaniesServiceFactory::getInstance($request->all(), $companiesCountPerPage);
        $companies = $searchCompaniesService->search();
        return view('results', ['companies' => $companies]);
    }
}