<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Http\Controllers;

use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function getCountryList()
    {
        $geographyService = app()[\App\Modules\Geography\Services\GeographyServiceInterface::class];
        return $geographyService->getCountries();
    }
}