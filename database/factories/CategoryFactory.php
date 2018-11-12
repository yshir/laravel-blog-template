<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    $randstr = $faker->unique()->lexify('??????');
    return [
        'name' => $randstr,
        'slug' => $randstr,
    ];
});