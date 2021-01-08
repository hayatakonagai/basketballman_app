<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Post;
use App\User;
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

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 10),
        'category' =>$faker->randomElement($array = array('技術','戦術','練習方法','メンタル','バスケ雑学','その他')),
        'body' => $faker->sentence,
        'url' =>$faker->url,
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
