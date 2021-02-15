<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vaccine;
use Faker\Generator as Faker;

$factory->define(Vaccine::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'vaccine_category_id'=> $faker->numberBetween(1,5)
    ];
});
