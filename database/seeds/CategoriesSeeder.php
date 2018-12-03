<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'test',
            'description' => 'test category',
        ]);

        DB::table('specialities')->insert([
            'name' => 'test',
            'description' => 'test speciality',
        ]);

        DB::table('types')->insert([
            'name' => 'test',
            'description' => 'test type',
        ]);
    }
}
