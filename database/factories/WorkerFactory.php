<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Worker;
use Faker\Generator as Faker;

$factory->define(Worker::class, function (Faker $faker) {
    return [
        'name'=> $faker->firstName,
        'surname' => $faker->lastName,
        'birthday'=> $faker->dateTime,
        'gender' => 'male',
        'work_experience'=> '10',
        'phone_number' => '09367247551'
    ];
});
