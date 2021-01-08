<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase; //DB（ここではtest_db）のデータを空にする
    /**
     * A basic test example.
     *
     * @return void
     */
    //ログインのテスト
    public function testCanRegister()
    {
        $response = $this
            ->get(route('register'));

        $response->assertStatus(200)
            ->assertViewIs('auth.register');
        $user = factory(User::class)->create();//ファクトリでユーザーデータを作成

        $response = $this->post('/register', [
        'name' => $user->name,
        'gender'  => $user->gender,
        'email' => $user->email,
        'password'  => $user->password,
        'password_confirmation'  => $user->password,
        'email'  => $user->email,
        'height'  => $user->height,
        'weight'  => $user->weight,
        'age' =>  $user->age,
        'where'  => $user->where,
        'position' =>  $user->position,
        'carrer[]'  => $user->carrer,
        'acievement'  => $user->acievement,
        'appeal' =>  $user->appeal
        ],
        );
    
    $this->assertDatabaseHas('users', ['name' => $user->name]); // DBにデータが保存されているか確認
    }
}
