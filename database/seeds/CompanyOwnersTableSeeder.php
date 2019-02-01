<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompanyOwnersTableSeeder extends Seeder
{
    public function run()
    {
        $verifiedDate = \Carbon\Carbon::now()->toDateTimeString();
        $companyOwners = [];
        for ($i = 0; $i < 200; $i++) {
            $companyOwners[] = [
                'email' => str_random(5) . '@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => $verifiedDate,
            ];
        }
        DB::table('company_owners')->insert($companyOwners);
    }
}

