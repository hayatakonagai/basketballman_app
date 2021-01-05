<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Team;
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

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => '募集中',
        'level' => $faker->randomElement($array = array('初級', '中級' ,'上級')),
        'goal' => $faker->sentence,
        'where' => $faker->randomElement($array = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県')),
        'where_city' => $faker->citySuffix,
        'where_detail' => $faker->secondaryAddress,
        'frequency' => $faker->randomElement($array = array('週1','週2','週3','週4','週5','週6','週7')),
        'people' => $faker->randomDigit,
        'wanted' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
        'user_id' => function() {
            return factory(App\User::class)->create()->id;
        }
    ];
});
