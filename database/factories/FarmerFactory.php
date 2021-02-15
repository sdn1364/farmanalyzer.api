<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Farmer;
use Faker\Generator as Faker;

$factory->define(Farmer::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'birthday' => $faker->date(),
        'education' => $faker->word(),
        'gender' => $faker->randomElement(['male', 'female']),
        'work_experience' => $faker->randomDigit,
        'city_id' => $faker->numberBetween(1, 5),
        'province_id'=> $faker->numberBetween(1, 5),
    ];
});
