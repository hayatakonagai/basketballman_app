<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends DuskTestCase
{
    use RefreshDatabase; //DB（laravel58-dusk）のデータを空にする
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testCanLogin()
    {
        $user = factory(User::class)->create();//ファクトリでユーザーデータを作成

        $this->browse(function (Browser $browser) use($user){
            $browser->visit('/register')
            ->type('name', $user->name)
            ->select('gender', $value = $user->gender)
            ->type('email', $user->email)
            ->type('password', 'password')
            ->type('password_confirmation', 'password')
            ->type('height', $user->height)
            ->type('weight', $user->weight)
            ->type('age', $user->age)
            ->select('where', $value = $user->where)
            ->radio('position', $value = $user->position)
            ->check('carrer[]', $value = $user->carrer)
            ->type('acievement', $user->acievement)
            ->type('appeal', $user->appeal)
            ->press('アカウント作成')
            ->pause(5000)
            ->assertSee('会員登録ありがとうございます！')
            ;
        });
    }
}
