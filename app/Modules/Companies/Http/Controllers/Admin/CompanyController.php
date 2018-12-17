<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Datatables\CompanyDataTable;
use App\Modules\Companies\Http\Requests\UpdateAdminCompanyRequest;
use App\Modules\Companies\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CompanyDataTable $companyDataTable
     * @return mixed
     */
    public function index(CompanyDataTable $companyDataTable)
    {
        return $companyDataTable->render('company.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAdminCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAdminCompanyRequest $request, Company $company)
    {
        $company->update($request->only(['status', 'images_limit']));
        return redirect()->route('company.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit')->with('company', $company);
    }
}
