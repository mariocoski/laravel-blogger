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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'display_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Article::class, function ($faker) use ($factory) {
    return [
        'user_id' => 1,
        'slug' => $faker->unique()->safeEmail,
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'content' => $faker->sentence,
        'references' => $faker->sentence,
        'article_image' => 'fox_unsplash.jpeg',
        'meta_keywords' => $faker->sentence,
        'meta_description' => $faker->sentence,
        'references' => $faker->sentence,
        'is_published' => true,
        'published_at' => date('Y-m-d H:i:s'),
    ];
});
