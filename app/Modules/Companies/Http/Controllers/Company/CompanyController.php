<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 19.01.19
 *
 */

namespace App\Modules\Companies\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Modules\Admins\Models\Category;
use App\Modules\Companies\DTO\AdminCompanyDTO;
use App\Modules\Companies\DTO\MyCompanyEditDTO;
use App\Modules\Companies\Enums\CompanyStatusEnum;
use App\Modules\Companies\Http\Requests\StoreAdminCompanyRequest;
use App\Modules\Companies\Http\Requests\StoreMyCompanyRequest;
use App\Modules\Companies\Http\Requests\UpdateMyCompanyRequest;
use App\Modules\Companies\Models\Company;
use App\Modules\Geography\Services\GeographyServiceInterface;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    private $companyOwner;

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $this->companyOwner = Auth::user();
        if ($company = $this->companyOwner->company) {
            return view('company::company.show', ['company' => $company]);
        }
        return redirect()->route('my-company.create');
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

        return view('company::company.create', ['dto' => $dto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMyCompanyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMyCompanyRequest $request)
    {
        $company = app()[Company::class];
        $company->fill($request->except([
            'company_images_limit',
            'team_images_limit',
            'status',
            'date_change_status',
            'date_change_status',
        ]));
        $company->status = CompanyStatusEnum::BLOCK;
        $company->company_owner_id = Auth::id();
        $company->save();
        return redirect()->route('my-company.show');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMyCompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMyCompanyRequest $request)
    {
        $company = Auth::user()->company;
        $company->update($request->except([
            'status',
            'company_images_limit',
            'team_images_limit',
            'date_change_status'

        ]));
        return redirect()->route('my-company.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $this->companyOwner = Auth::user();
        $company = $this->companyOwner->company;
        $geographyService = app()[GeographyServiceInterface::class];
        $countries = $geographyService
            ->getCountries()
            ->pluck('name', 'id')
            ->toArray();
        $categories = Category::all(['id', 'name'])
            ->pluck('name', 'id')
            ->toArray();
        $dto = new MyCompanyEditDTO($company, $countries, $categories);
        return view('company.edit', ['dto' => $dto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy()
    {
        Auth::user()->company->delete();
        return redirect()->route('my-company.create');
    }

}
