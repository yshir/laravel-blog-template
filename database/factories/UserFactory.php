<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role' => $faker->randomElement(['system', 'admin', 'user', 'editor']),
        'avatar' => $faker->imageUrl($width = 640, $height = 480, $category = 'cats', $randomize = true, $word = null),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'pass',
        'remember_token' => str_random(10),
    ];
});