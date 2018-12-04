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
            ['name' => 'test', 'description' => 'test category description',],
            ['name' => 'test2', 'description' => 'test2 category description',],
            ['name' => 'test3', 'description' => 'test3 category description',]
        ]);

        DB::table('specialities')->insert([
            ['name' => 'test', 'description' => 'test speciality description',],
            ['name' => 'test2', 'description' => 'test2 speciality description',],
            ['name' => 'test3', 'description' => 'test3 speciality description',]
        ]);

        DB::table('types')->insert([
            ['name' => 'test', 'description' => 'test type description',],
            ['name' => 'test2', 'description' => 'test2 type description',],
            ['name' => 'test3', 'description' => 'test3 type description',]
        ]);
    }
}
