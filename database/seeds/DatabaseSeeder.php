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
         $this->call(AdminTableSeeder::class);
<<<<<<< HEAD
//         $this->call(GeographyTableSeeder::class);
=======
         $this->call(GeographyTableSeeder::class);
>>>>>>> e4014f61c9c122663b441a06abce780df31eab72
    }
}
