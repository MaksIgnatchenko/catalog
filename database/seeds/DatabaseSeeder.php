<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GeographyTableSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SuperAdminRoleSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(CompanyOwnersTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
    }
}
