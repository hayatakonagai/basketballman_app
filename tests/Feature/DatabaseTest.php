<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class DatabaseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //テスト用DB(test_db）Userテーブルでレコード作成→削除のテスト
    public function testDatabaseUser()
    {
        $user = new User;
        $user->name = "hayata";
        $user->email = "scchr1208@gmail.com";
        $user->password = "password";
        $user->gender = "male";
        $user->height = 180;
        $user->weight = 100;
        $user->age =30;
        $user->where ="東京都";
        $user->position = "PF";
        $user->carrer = "大学まで";
        $user->acievement ="全国大会でベスト８に入っています";
        $user->appeal = "本気でやっているチームに入りたいです";
        $user->image = null;
        $user->save();

        $FindUser = User::where('name', 'hayata')->first();
        $this->assertNotNull($FindUser);            // データが取得できたかテスト
        User::where('name', 'hayata')->delete(); // テストデータの削除
    }
}
