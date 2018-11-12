<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Model\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
        'category_id' => $faker->numberBetween($min = 1, $max = 50),
        'title' => $faker->realText($maxNbChars = 10),
        'slug' => $faker->unique()->lexify('?????-?????-?????'),
        'body' => $faker->realText($maxNbChars = 1000),
        'thumbnail' => $faker->imageUrl,
        'status' => $faker->randomElement(['draft', 'published']),
        'meta_description' => $faker->realText($maxNbChars = 100),
        'published_at' => Carbon::now(),
    ];
});
