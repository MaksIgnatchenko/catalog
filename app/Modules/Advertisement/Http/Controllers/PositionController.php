<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Advertisement\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Advertisement\Enums\AdblockPositionsEnum;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function getAvailablePositions(Request $request) : JsonResponse
    {
        $positions = [];
        if ($request->type) {
            $adPositions = AdblockPositionsEnum::getPositions($request->type);
            $positions = [];
            foreach ($adPositions as $position) {
                $positions[$position] = $position;
            }
        }
        return response()->json($positions);
    }
}