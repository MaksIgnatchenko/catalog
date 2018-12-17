<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Advertisement\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Advertisement\Enums\AdblockPositionsEnum;
use Illuminate\Http\JsonResponse;

class PositionController extends Controller
{
    /**
     * @param string $type
     * @return JsonResponse
     */
    public function getAvailablePositions(string $type = null) : JsonResponse
    {
        $positions = [];
        if ($type) {
            $adPositions = AdblockPositionsEnum::getPositions($type);
            $positions = [];
            foreach ($adPositions as $position) {
                $positions[$position] = $position;
            }
        }
        return response()->json($positions);
    }
}