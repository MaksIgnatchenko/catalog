<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 18.01.19
 *
 */

namespace App\Modules\Companies\Http\Controllers\Company;


use App\Modules\Companies\DTO\CompanyDashboardDTO;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function __invoke()
    {
        $dto = new CompanyDashboardDTO(
            Auth::user(),
            null
        );
        return view('company::home')->with('dto', $dto);
    }
}