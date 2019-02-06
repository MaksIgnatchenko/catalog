<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Http\Controllers;

use App\Helpers\ApiCode;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class CityController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
	public function getFromCountry(Request $request) : JsonResponse
	{
	    $countryId = $request->get('country');
	    if ($countryId) {
            $geographyService = app()[\App\Modules\Geography\Services\GeographyServiceInterface::class];
            try {
                if ($request->get('with-companies')) {
                    $cities = $geographyService
                        ->getCitiesHaveCompaniesFromCountry($countryId, ['geography_cities.id', 'geography_cities.name'])
                        ->pluck('name', 'id')
                        ->sort();
                } else {
                    $cities = $geographyService
                        ->getCitiesFromCountry($countryId, ['geography_cities.id', 'geography_cities.name'])
                        ->pluck('name', 'id')
                        ->sort();
                }
            } catch (ModelNotFoundException | QueryException $e) {
                return ResponseBuilder::error(ApiCode::NO_SUCH_COUNTRY);
            }
        } else {
	        $cities = [];
        }
        return response()->json($cities);
	}
}
