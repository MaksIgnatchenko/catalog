<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 24.01.19
 *
 */

namespace App\Modules\Companies\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Http\Requests\CompanyOwnerUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CompanyOwnerController extends Controller
{
    public function edit()
    {
        $companyOwner = Auth::user();
        return view('companyOwner.edit', ['companyOwner' => $companyOwner]);
    }

    public function update(CompanyOwnerUpdateRequest $request)
    {
        $companyOwner = Auth::user();
        if ($request->password) {
            $request->merge(['password'  => Hash::make($request->password)]);
        }
        $companyOwner->update($request->all());
        return redirect()->route('company');
    }
}