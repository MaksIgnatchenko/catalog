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
        $companyOwners = \App\Modules\Companies\Models\CompanyOwner::all();
        $countries = \App\Modules\Geography\Models\GeographyCountry::with('cities')->has('cities')->get();
        $categories = \App\Modules\Admins\Models\Category::all();

        $companies = [];
        $companyIdentifier = 1;

        foreach ($companyOwners as $companyOwner) {
            $country = $countries->random();
            $city = $country->cities->random();
            $category = $categories->random();
            $speciality = $category->specialities->random();
            $type = $speciality->types->random();

            $companies[] = [
                'company_owner_id' => $companyOwner->id,
                'name' => 'test-company-' . $companyIdentifier,
                'country_id' => $country->id,
                'city_id' => $city->id,
                'category_id' => $category->id,
                'speciality_id' => $speciality->id,
                'type_id' => $type->id,
                'company_images_limit' => 5,
                'team_images_limit' => 5,
                'status' => \App\Modules\Companies\Enums\CompanyStatusEnum::ACTIVE,
                'about_us' => 'Test about us',
                'our_services' => 'Test our services',
                'work_days' => json_encode(['mon' => ['from' => '10:00', 'to' => '18:00']]),
                'phones' => json_encode([0 => '11111111111']),
                'location_link' => 'https://www.google.com/maps/place/Google/@50.4600746,30.5201835,17z/data=!3m1!4b1!4m5!3m4!1s0x40d4ce46a355fd4f:0x9bb1b5375abbc47!8m2!3d50.4600746!4d30.5223775',
                'website' => 'https://' . 'test-company-' . $companyIdentifier . 'com',
            ];
            $companyIdentifier++;
        }
        DB::table('companies')->insert($companies);
    }
}

