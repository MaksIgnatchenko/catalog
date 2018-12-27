<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Observers;

use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Services\CompanyStatusChanger;

class CompanyObserver
{
    /**
     * Detect user location.
     *
     * @param Company $company
     */
    public function updating(Company $company) : void
    {
        $changedAttributes = $company->getDirty();
//        dd($changedAttributes);
        $companyStatusChanger = new CompanyStatusChanger($changedAttributes);
        $statusData = $companyStatusChanger->getUpdatedData();
//        dd($statusData);
        $company->fill(array_merge($statusData));
    }
}