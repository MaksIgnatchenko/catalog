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
     * Creating company listener.
     *
     * @param Company $company
     */
    public function creating(Company $company) : void
    {
        $attributes = $company->toArray();
        $companyStatusChanger = new CompanyStatusChanger($attributes);
        $statusData = $companyStatusChanger->getReplacementData();
        $company->fill(array_merge($statusData));
    }

    /**
     * Updating company listener.
     *
     * @param Company $company
     */
    public function updating(Company $company) : void
    {
        $changedAttributes = $company->getDirty();
        $companyStatusChanger = new CompanyStatusChanger($changedAttributes);
        $statusData = $companyStatusChanger->getReplacementData();
        $company->fill(array_merge($statusData));
    }
}