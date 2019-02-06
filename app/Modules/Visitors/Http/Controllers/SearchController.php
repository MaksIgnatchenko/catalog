<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 31.01.19
 *
 */

namespace App\Modules\Visitors\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Visitors\Services\SearchCompanies\Factories\SearchCompaniesServiceFactory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
     /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $companiesCountPerPage = config('app_config.companies_count_per_page');
        $searchCompaniesService = SearchCompaniesServiceFactory::getInstance($request->all(), $companiesCountPerPage);
        $companies = $searchCompaniesService->search();
        return view('results', ['companies' => $companies]);
    }
}