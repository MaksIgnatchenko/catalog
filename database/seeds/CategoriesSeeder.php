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
        $categories = [];
        for($i = 1; $i < 10; $i++) {
            $categories[] = [
                'name' => 'Category' . $i,
                'description' => 'test description',
            ];
        }
        DB::table('categories')->insert($categories);
        $categories = \App\Modules\Admins\Models\Category::all();
        $n = 1;
        $specialities = [];
        foreach($categories as $category) {
            for($i = 1; $i <= 2; $i++, $n++) {
                $specialities[] = [
                    'name' => 'Speciality' . $n,
                    'category_id' => $category->id,
                    'description' => 'test description',
                ];
            }
        }
        DB::table('specialities')->insert($specialities);
        $specialities = \App\Modules\Admins\Models\Speciality::all();
        $n = 1;
        $types = [];
        foreach($specialities as $speciality) {
            for($i = 1; $i <= 2; $i++, $n++) {
                $types[] = [
                    'name' => 'Type' . $n,
                    'speciality_id' => $speciality->id,
                    'description' => 'test description',
                ];
            }
        }
        DB::table('types')->insert($types);
    }
}