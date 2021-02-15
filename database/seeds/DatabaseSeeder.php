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
        factory(\App\Disease::class,5)->create();
        factory(\App\Farmer::class, 5)->create();
        factory(\App\City::class, 5)->create();
        factory(\App\Province::class, 5)->create();
        factory(\App\Worker::class, 5)->create();
        factory(\App\Farm::class,15)->create();
        factory(\App\Expert::class, 5)->create();
        factory(\App\Herd::class, 25)->create();
        factory(\App\Vaccine_category::class, 5)->create();
        factory(\App\Vaccine::class, 5)->create();
        factory(\App\Vaccine_company::class, 5)->create();
        factory(\App\Vaccine_method::class, 5)->create();
        factory(\App\Andata::class, 100)->create();
    }
}
