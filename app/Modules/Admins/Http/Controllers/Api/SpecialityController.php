<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Category;
use Illuminate\Http\JsonResponse;

class SpecialityController extends Controller
{
    /**
     * Get array of specialities belongs to particular catefory.
     *
     * @param Category $category
     * @return JsonResponse
     */
    public function getFromCategory(Category $category) : JsonResponse
    {
        $specialities = $category->specialities()
            ->get(['name', 'id'])
            ->pluck('name', 'id');
        return response()->json($specialities);
    }
}