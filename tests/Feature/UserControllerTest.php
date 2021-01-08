<?php

namespace Tests\Feature;

use App\User;
use App\Team;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase; //DB（ここではtest_db）のデータを空にする 
    /**
     * A basic test example.
     *
     * @return void
     */
//ログインした状態でマイページ画面が表示されるかテスト
    public function testCanSeeMypage()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('mypage'));

        $response->assertStatus(200) 
            ->assertViewIs('users.mypage')
            ->assertSee($user->name);
    }

//自分が作成したチームがマイページに反映されているかテスト    
    public function testCanSeeMyTeam()
    {
        $user = factory(User::class)->create();
        $team = factory(Team::class)->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user)
            ->get(route('mypage'));

        $response->assertStatus(200) 
            ->assertViewIs('users.mypage')
            ->assertSee($team->name);
    }


//パスワードの変更テスト
    public function testCanChangeMyPassword()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->get(route('mypage.edit_password'));

        $response->assertStatus(200) 
            ->assertViewIs('users.edit_password');

        $password = Str::random(10); 

        $response = $this->post('/password/reset', [
                'password' => $password
        ]);

        $response->assertRedirect('/home');
    }    
}
