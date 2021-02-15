<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expert;
use Faker\Generator as Faker;

$factory->define(Expert::class, function (Faker $faker) {
    return [
        'name'=> $faker->firstName,
        'surname'=>$faker->lastName,
        'birthday'=>$faker->date(),
        'education'=>$faker->word,
        'gender'=> $faker->randomElement(['male','female']),
        'work_experience'=>$faker->randomDigit,
        'phone_number'=>$faker->phoneNumber,
    ];
});
