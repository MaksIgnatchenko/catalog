<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $countries = \App\Modules\Geography\Models\GeographyCountry::all();
        $categories = \App\Modules\Admins\Models\Category::all();
        $dates = [
            '2018-12-14',
            '2018-12-15',
            '2018-12-16',
        ];
        $insert = [];
        for ($i = 1; $i <= 9; $i++) {
            $city = null;
            while (!$city) {
                $country = $countries->random();
                $city = $country->cities()->first();
            }
            $category =  $categories->random();
            $speciality = $category->specialities()->first();
            $type = $speciality->types()->first();
            $insert[] = [
                'name' => 'Company' . $i,
                'email' => 'test' . $i . '@gmail.com',
                'password' => Hash::make('test123'),
                'country_id' => $country->id,
                'city_id' => $city->id,
                'category_id' => $category->id,
                'speciality_id' => $speciality->id,
                'type_id' => $type->id,
                'logo' => null,
                'images_limit' => config('company.default_company_images_limit'),
                'status' => 'active',
                'created_at' => $dates[array_rand($dates)],
            ];
        }
        DB::table('companies')->insert($insert);
    }
}

