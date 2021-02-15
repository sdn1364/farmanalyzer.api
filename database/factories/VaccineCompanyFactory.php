<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vaccine_company;
use Faker\Generator as Faker;

$factory->define(Vaccine_company::class, function (Faker $faker) {
    return [
        'name'=> $faker->name
    ];
});
