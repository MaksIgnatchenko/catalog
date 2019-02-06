<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers\Api;

use App\Helpers\ApiCode;
use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Speciality;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class TypeController extends Controller
{
    /**
     * Get array of types belongs to particular speciality.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getFromSpeciality(Request $request) : JsonResponse
    {
        try {
            $speciality = Speciality::findOrFail($request->speciality);
        } catch (ModelNotFoundException | QueryException $e) {
            return ResponseBuilder::error(ApiCode::NO_SUCH_SPECIALITY);
        }
        if ($request->get('with-companies')) {
            $types = $speciality->types()
                ->has('companies')
                ->get(['name', 'id'])
                ->pluck('name', 'id')
                ->toArray();
        } else {
            $types = $speciality->types()
                ->get(['name', 'id'])
                ->pluck('name', 'id')
                ->toArray();
        }
        return response()->json($types);
    }
}