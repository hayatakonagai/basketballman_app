<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'gender' => $faker->randomElement($array = array('male', 'female')),
        'height' => $faker->numberBetween($min = 150, $max = 200),
        'weight' => $faker->numberBetween($min = 50, $max = 100),
        'age' => $faker->randomNumber(2),
        'where' => $faker->randomElement($array = array('北海道','青森県','岩手県','宮城県','秋田県','山形県','福島県','茨城県','栃木県','群馬県','埼玉県','千葉県','東京都','神奈川県','新潟県','富山県','石川県','福井県','山梨県','長野県','岐阜県','静岡県','愛知県','三重県','滋賀県','京都府','大阪府','兵庫県','奈良県','和歌山県','鳥取県','島根県','岡山県','広島県','山口県','徳島県','香川県','愛媛県','高知県','福岡県','佐賀県','長崎県','熊本県','大分県','宮崎県','鹿児島県','沖縄県')),
        'position' => $faker->randomElement($array = array('PG', 'SG' ,'SF','PF','C')),
        'carrer' => $faker->randomElement($array = array('未経験','中学まで','高校まで','大学まで','実業団','クラブチーム')),
        'acievement' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'appeal' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'image' => $faker->imageUrl($width = 640, $height = 480, 'cats'),
    ];
});
