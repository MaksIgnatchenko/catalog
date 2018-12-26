<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    public function run()
    {
        $admin = new \App\Modules\Admins\Models\Admin();
        $admin->name = 'superadmin';
        $admin->email = 'appus.catalog@gmail.com';
        $admin->password = 'admin';
        $admin->save();
        $roleId = \App\Modules\Permissions\Models\Role::where('name','superadmin')->first();
        $admin->attachRole($roleId);

    }
}

