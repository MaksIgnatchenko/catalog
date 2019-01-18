<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        $companyOwner = \App\Modules\Companies\Models\CompanyOwner::first();
        $company = app()[\App\Modules\Companies\Models\Company::class];
        $company->company_owner_id = $companyOwner->id;
        $company->name = 'TestCompany';
        $company->country_id = 1;
        $company->city_id = 1;
        $company->category_id = 1;
        $company->speciality_id = 1;
        $company->type_id = 1;
        $company->company_images_limit = 5;
        $company->team_images_limit = 5;
        $company->status = \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE;
        $company->about_us = 'Test about us';
        $company->our_services = 'Test our services';
        $company->work_days = ['mon' => ['from' => '10:00', 'to' => '18:00']];
        $company->phones = [0 => '11111111111'];
        $company->website = 'https://google.com';
        $company->save();
    }
}

