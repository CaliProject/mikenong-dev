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

//$factory->define(App\Category::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'parent_id' => $faker->randomKey()
//    ];
//});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(5),
        'user_id' => $faker->numberBetween(201, 301),
        'contact_name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'cellphone' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'release_date' => $faker->date('Y-m'),
        'address' => $faker->address,
        'category_id' => $faker->numberBetween(1, 10),
        'pricing' => $faker->numberBetween(1,5),
        'description' => $faker->realText(),
        'status' => $faker->randomElement(['provide', 'demand']),
        'is_essential' => $faker->randomKey([0, 1]),
        'is_sticky' => $faker->randomKey([0, 1]),
    ];
});

$factory->define(App\Pricing::class, function (Faker\Generator $faker) {
   return [
       'market' => $faker->name,
       'min_price' => $faker->randomFloat(null, 0, 15),
       'max_price' => $faker->randomFloat(null, 0, 15),
       'avg_price' => $faker->randomFloat(null, 0, 15),
       'category' => $faker->name,
        'measurement' => $faker->name
   ];
});
