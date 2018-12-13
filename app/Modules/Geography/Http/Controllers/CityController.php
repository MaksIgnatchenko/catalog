<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse
     */
	public function getFromCountry(int $id) : JsonResponse
	{
        $geographyService = app()[\App\Modules\Geography\Services\GeographyServiceInterface::class];
        $cities = $geographyService
            ->getCitiesFromCountry($id, ['geography_cities.id', 'geography_cities.name'])
            ->pluck('name', 'id');
        return response()->json($cities);
	}
}