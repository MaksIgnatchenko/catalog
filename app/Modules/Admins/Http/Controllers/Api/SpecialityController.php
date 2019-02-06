<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers\Api;

use App\Helpers\ApiCode;
use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder;

class SpecialityController extends Controller
{
    /**
     * Get array of specialities belongs to particular catefory.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getFromCategory(Request $request) : JsonResponse
    {
        try {
            $category = Category::find($request->category);
        } catch (ModelNotFoundException | QueryException $e) {
            return ResponseBuilder::error(ApiCode::NO_SUCH_CATEGORY);
        }
        if ($request->get('with-companies')) {
            $specialities = $category->specialities()
                ->has('companies')
                ->get(['name', 'id'])
                ->pluck('name', 'id');
        } else {
            $specialities = $category->specialities()
                ->get(['name', 'id'])
                ->pluck('name', 'id');
        }
        return response()->json($specialities);
    }
}