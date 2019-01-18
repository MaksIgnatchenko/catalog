<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admins\DTO\HomeDashboardDto;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $statistic = new HomeDashboardDto();
        return view('admin::home')->with('statistic', $statistic);
    }
}