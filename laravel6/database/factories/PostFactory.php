<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'content' => $faker->sentence(50)
    ];
});




//    return [
//        'slug' => ucfirst($faker->word),
//        'title' => $faker->sentence(10),
//        'body' => $faker->sentence(50),
//        'created_at' => now()
//    ];
