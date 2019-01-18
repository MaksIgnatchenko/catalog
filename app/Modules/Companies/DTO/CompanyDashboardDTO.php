<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 18.01.19
 *
 */

namespace App\Modules\Companies\DTO;

use App\Modules\Companies\Models\Company;
use App\Modules\Companies\Models\CompanyOwner;

class CompanyDashboardDTO
{
    private $companyOwner;
    private $company;

    public function __construct(CompanyOwner $companyOwner, Company $company = null)
    {
        $this->companyOwner = $companyOwner;
        $this->company = $company;
    }

    public function getCompanyOwnerEmail()
    {
        return $this->companyOwner->email;
    }

}