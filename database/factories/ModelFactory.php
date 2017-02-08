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
        'slug' => $faker->unique()->word,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->unique()->word,
        'slug' => str_slug($name),
    ];
});

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $name = $faker->unique()->word,
        'slug' => str_slug($name),
    ];
});

$factory->define(App\Models\Article::class, function ($faker) use ($factory) {

    return [
        'author_id' => 1,
        'category_id' => 1,
        'title' => $title = $faker->sentence,
        'slug' => str_slug($title),
        'subtitle' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'article_image' => '',
        'is_published' => true,
        'published_at' => date('Y-m-d H:i:s'),
    ];
});
