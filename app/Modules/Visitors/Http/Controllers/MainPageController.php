<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 01.02.19
 *
 */

namespace App\Modules\Visitors\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Category;
use App\Modules\Geography\Services\GeographyServiceInterface;
use App\Modules\Visitors\DTO\MainPageDTO;

class MainPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        $geographyService = app()[GeographyServiceInterface::class];
        $countries = $geographyService
            ->getCountriesHaveCompanies()
            ->pluck('name', 'id')
            ->toArray();
        $categories = Category::has('companies')
            ->get(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();
        $dto = new MainPageDTO($countries, $categories);
        return view('index', ['dto' => $dto]);
    }
}