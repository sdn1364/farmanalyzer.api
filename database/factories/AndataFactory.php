<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Andata;
use Faker\Generator as Faker;

$factory->define(Andata::class, function (Faker $faker) {
    return [
        'date' => $faker->date(),
        'farm_id' => factory(\App\Farm::class),
        'herd_id' => factory(\App\Herd::class),
        'current_age' => $faker->randomDigit,
        'temperature'=> $faker->randomDigit,

        'humidity' => $faker->randomDigit,
        'light_off'=>$faker->numberBetween(1, 12),
        'weight_average'=>$faker->randomNumber(),
        'vaccine_id' => $faker->numberBetween(1, 5),
        'vaccine_method_id' => $faker->numberBetween(1, 5),
        'vaccine_company_id' => $faker->numberBetween(1, 5),
    ];
});
