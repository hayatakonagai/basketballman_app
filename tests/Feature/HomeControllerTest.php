<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase; //DB（ここではtest_db）のデータを空にする
    /**
     * A basic test example.
     *
     * @return void
     */
    //ログインのテスト
    public function testBasicTest()
    {
        $user = factory(User::class)->create();//ファクトリでユーザーデータを作成

        $response = $this
            ->actingAs($user) // ファクトリで作ったユーザーデータでログイン中状態を作る
            ->get(route('home'));

        $response->assertStatus(200)
            ->assertViewIs('home')
            ->assertSee('ログインしました');
    }
}
