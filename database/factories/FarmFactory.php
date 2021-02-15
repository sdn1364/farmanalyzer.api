<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Farm;
use Faker\Generator as Faker;

$factory->define(Farm::class, function (Faker $faker) {
    return [
        'name'=> $faker->firstName,
        'farmer_id' => $faker->numberBetween(0, 5),
        'birthday'=> $faker->date(),
        'phone_number'=>$faker->phoneNumber,
        'email'=>$faker->email,
        'type'=> $faker->word,
        'city_id' => $faker->numberBetween(1, 5),
        'province_id'=>$faker->numberBetween(1,5),
        'address'=>$faker->address,
        'gmap'=>$faker->latitude.','.$faker->longitude,
        'herd'=> $faker->randomDigit,
        'expert_id'=>$faker->numberBetween(1,5),

    ];
});
