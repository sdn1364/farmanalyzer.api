<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Herd;
use Faker\Generator as Faker;

$factory->define(Herd::class, function (Faker $faker) {
    return [
        'herd_number'=>$faker->randomDigit(),
        'age'=>$faker->randomDigit(),
        'quantity'=>$faker->randomDigit(),
        'saloon_area'=>$faker->randomDigit(),
        'capacity'=>$faker->randomDigit(),
        'farm_id' => $faker->numberBetween(1, 5),
        'start_date' => $faker->date()
    ];
});
