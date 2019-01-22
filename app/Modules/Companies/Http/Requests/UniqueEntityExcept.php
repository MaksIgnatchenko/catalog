<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 10.12.2018
 *
 */

namespace App\Modules\Company\Http\Requests;

use Illuminate\Support\Facades\Auth;

trait UniqueEntityExcept
{
    /**
     * @return int
     */
    public function exceptId() : int
    {
        return Auth::user()->company->id;
    }
}
