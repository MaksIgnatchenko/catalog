<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Category1',
                'description' => 'Category1 description',
            ],
            [
                'name' => 'Category2',
                'description' => 'Category2 description',
            ],
        ];
        DB::table('categories')->insert($categories);

        $specialities = [
            [
                'name' => 'Speciality1',
                'description' => 'Speciality1 description',
                'category_id' => 1,
            ],
            [
                'name' => 'Speciality2',
                'description' => 'Speciality2 description',
                'category_id' => 1,
            ],
            [
                'name' => 'Speciality3',
                'description' => 'Speciality3 description',
                'category_id' => 2,
            ],
            [
                'name' => 'Speciality4',
                'description' => 'Speciality4 description',
                'category_id' => 2,
            ],
        ];
        DB::table('specialities')->insert($specialities);

        $types = [
            [
                'name' => 'Type1',
                'description' => 'Type1 description',
                'speciality_id' => 1,
            ],
            [
                'name' => 'Type2',
                'description' => 'Type2 description',
                'speciality_id' => 1,
            ],
            [
                'name' => 'Type3',
                'description' => 'Type3 description',
                'speciality_id' => 2,
            ],
            [
                'name' => 'Type4',
                'description' => 'Type4 description',
                'speciality_id' => 2,
            ],
            [
                'name' => 'Type5',
                'description' => 'Type5 description',
                'speciality_id' => 3,
            ],
            [
                'name' => 'Type6',
                'description' => 'Type6 description',
                'speciality_id' => 3,
            ],
            [
                'name' => 'Type7',
                'description' => 'Type7 description',
                'speciality_id' => 4,
            ],
            [
                'name' => 'Type8',
                'description' => 'Type8 description',
                'speciality_id' => 4,
            ],
        ];
        DB::table('types')->insert($types);
    }
}
