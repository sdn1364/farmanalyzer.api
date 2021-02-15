<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vaccine_category;
use Faker\Generator as Faker;

$factory->define(Vaccine_category::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
    ];
});
