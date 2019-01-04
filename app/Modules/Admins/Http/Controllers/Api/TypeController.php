<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Speciality;
use Illuminate\Http\JsonResponse;

class TypeController extends Controller
{
    /**
     * Get array of types belongs to particular speciality.
     *
     * @param Speciality $speciality
     * @return JsonResponse
     */
    public function getFromSpeciality(Speciality $speciality) : JsonResponse
    {
        $types = $speciality->types()
            ->get(['name', 'id'])
            ->pluck('name', 'id');
        return response()->json($types);
    }
}