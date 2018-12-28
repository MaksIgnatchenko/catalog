<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Companies\Datatables\CompanyDataTable;
use App\Modules\Companies\Http\Requests\EditAdminCompanyRequest;
use App\Modules\Companies\Http\Requests\UpdateAdminCompanyRequest;
use App\Modules\Companies\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     */
    public function __construct()
    {
        $this->middleware('permission:index_companies')->only('index');
        $this->middleware('permission:read_companies')->only('show');
        $this->middleware('permission:create_companies')->only(['create', 'store']);
        $this->middleware('permission:edit_companies')->only(['edit', 'update']);
        $this->middleware('permission:delete_companies')->only('destroy');
    }

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
        $company->update($request->only(['status', 'company_images_limit', 'team_images_limit', 'date_change_status']));
        return redirect()->route('company.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  EditAdminCompanyRequest  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(EditAdminCompanyRequest $request, Company $company)
    {
        return view('company.edit', ['company' => $company, 'operation' => $request->operation, 'newStatus' => $request->newStatus]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index');
    }

}
