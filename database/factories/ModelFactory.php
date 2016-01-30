<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt("123456"),
//        'password' => bcrypt(str_random(10)),
        'real_name' => $faker->name,
        'role' => $faker->randomElement(['individual', 'cooperative']),
        'gender' => $faker->randomElement(['male', 'female']),
        'cellphone' => $faker->phoneNumber,
        'qq' => $faker->randomNumber(9),
        'coop_name' => $faker->company,
        'coop_phone' => $faker->phoneNumber,
        'taobao' => $faker->url,
        'remember_token' => str_random(10),
    ];
});
