<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Tag::class, function (Faker $faker) {
    $randstr = $faker->unique()->lexify('????');
    return [
        'name' => $randstr,
        'slug' => $randstr,
    ];
});
