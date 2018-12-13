<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Http\Controllers;

use App\Http\Controllers\Controller;
use Khsing\World\Models\Country;

class CityController extends Controller
{
	public function getFromCountry(int $id)
	{
		$country = Country::find($id);
		$cities = $country
			->cities()
			->get(['id', 'name'])
			->pluck('name', 'id')
			->toArray();
		return response()->json($cities);
	}
}