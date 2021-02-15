<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Province;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name'=> $faker->city,
        'province_id' => $faker->numberBetween(1, 5),
    ];
});
