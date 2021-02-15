<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vaccine_method;
use Faker\Generator as Faker;

$factory->define(Vaccine_method::class, function (Faker $faker) {
    return [
        'name'=> $faker->name
    ];
});
