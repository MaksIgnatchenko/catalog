<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Http\Controllers;

use App\Helpers\ApiCode;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\JsonResponse;
=======
use App\Modules\Geography\Http\Requests\GetCitiesRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72

class CityController extends Controller
{
    /**
<<<<<<< HEAD
     * @param int $id
     * @return JsonResponse
     */
	public function getFromCountry(int $id) : JsonResponse
	{
        $geographyService = app()[\App\Modules\Geography\Services\GeographyServiceInterface::class];
        $cities = $geographyService
            ->getCitiesFromCountry($id, ['geography_cities.id', 'geography_cities.name'])
            ->pluck('name', 'id');
=======
     * @param GetCitiesRequest $request
     * @return JsonResponse
     */
	public function getFromCountry(GetCitiesRequest $request) : JsonResponse
	{
	    $countryId = $request->country;
        $geographyService = app()[\App\Modules\Geography\Services\GeographyServiceInterface::class];
        try {
            $cities = $geographyService
                ->getCitiesFromCountry($countryId, ['geography_cities.id', 'geography_cities.name'])
                ->pluck('name', 'id');
        } catch (ModelNotFoundException | QueryException $e) {
            return ResponseBuilder::error(ApiCode::NO_SUCH_COUNTRY);
        }
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
        return response()->json($cities);
	}
}
