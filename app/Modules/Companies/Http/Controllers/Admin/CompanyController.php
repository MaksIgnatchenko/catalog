<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Category;
use App\Modules\Companies\Datatables\CompanyDataTable;
use App\Modules\Companies\DTO\AdminCompanyDTO;
use App\Modules\Companies\Enums\CompanyStatusEnum;
use App\Modules\Companies\Http\Requests\EditAdminCompanyRequest;
use App\Modules\Companies\Http\Requests\StoreAdminCompanyRequest;
use App\Modules\Companies\Http\Requests\UpdateAdminCompanyRequest;
use App\Modules\Companies\Models\Company;
use App\Modules\Geography\Services\GeographyServiceInterface;
use Illuminate\Http\Request;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $geographyService = app()[GeographyServiceInterface::class];
        $countries = $geographyService
            ->getCountries()
            ->pluck('name', 'id')
            ->toArray();
        $categories = Category::all(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();
        $statuses = [];
        foreach (CompanyStatusEnum::getBasicStatuses() as $status) {
            $statuses[$status] = $status;
        }
        $dto = new AdminCompanyDTO($countries, $categories, $statuses);

        return view('company.create', ['dto' => $dto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAdminCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminCompanyRequest $request)
    {
        $company = app()[Company::class];
        $company->fill($request->all());
        $company->save();
        return redirect()->route('company.index');
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
