<?php

use Illuminate\Database\Seeder;

class SuperAdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new \App\Modules\Permissions\Models\Role();
        $role->name = 'superadmin';
        $role->display_name = 'Super Admin';
        $role->save();
        $role->attachPermissions(\App\Modules\Permissions\Models\Permission::all('id')
            ->pluck('id', 'id')
            ->toArray());
    }
}
