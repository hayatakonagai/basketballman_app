<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Str;
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

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        },
        'post_id' => function() {
            return factory(App\Post::class)->create()->id;
        }
    ];
});