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
        $companyOwner = app()[\App\Modules\Companies\Models\CompanyOwner::class];
        $companyOwner->email = 'foecunditate@gmail.com';
        $companyOwner->password = Hash::make('password');
        $companyOwner->save();
    }
}

