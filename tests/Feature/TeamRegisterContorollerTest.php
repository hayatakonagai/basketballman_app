<?php

namespace Tests\Feature;

use App\User;
use App\Team;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase; //DB（ここではtest_db）のデータを空にする
    /**
     * A basic test example.
     *
     * @return void
     */

//CRUD機能のテストを一通り行います

//indexにアクセスして、作成したチームが表示されているか
    public function testCanSeeIndex()
    {
        $team = factory(Team::class)->create();

        $response = $this
            ->get('/teams');

        $response->assertStatus(200)
            ->assertViewIs('teams.index')
            ->assertSee($team->name)
            ->assertSee($team->level)
            ->assertSee($team->where)
            ->assertSee($team->wanted);

    }

 //作成されたチームデータがshowページに反映されているか（閲覧できるか）   
    public function testCanSeeShow()
    {
        $team = factory(Team::class)->create();

        $response = $this
        ->get('/teams/'.$team->id);

        $response->assertStatus(200)
        ->assertViewIs('teams.show')
        ->assertsee($team->name)
        ->assertSee($team->user->name); //リレーション（Userモデル）
    }

//フォームリクエストの挙動を確認
    public function testCanCreate()
    {
        $user = factory(User::class)->create();//ファクトリでユーザーデータを作成

        $response = $this
            ->actingAs($user) // ファクトリで作ったユーザーデータでログイン中状態を作る
            ->get('/teams/create');

        $response->assertStatus(200)
            ->assertViewIs('teams.create');
            
        $response = $this->post('/teams', [
                'name' => 'TOKYOBASKETBALL',
                'status' =>'募集中',
                'level' => '初級' ,
                'goal' => '区大会1回戦突破！' ,
                'where' => '東京都' ,
                'where_city' => '大田区' ,
                'where_detail' => null,
                'frequency' => '週1' ,
                'people' => '10人' ,
                'wanted' => '未経験者歓迎〜高校部活くらいまでの経験者' ,
                'description' => '新しく作ったチームです。大会への出場と初勝利を目指して一緒に頑張ってくれる人を募集しています' ,
                'image' => null ,
                'user_id' => $user->id ,
            ],
        );
        
        $response->assertRedirect('teams');  // indexへリダイレクト

        $this->assertDatabaseHas('teams', ['name' => 'TOKYOBASKETBALL']); // DBにデータが保存されているか確認
    }

//作成データの更新の挙動を確認
    public function testCanUpdate()
    {
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user); // ファクトリで作ったユーザーデータでログイン中状態を作る

        $team = factory(Team::class)->create();

        $response = $this
            ->get('teams/'. $team->id .'/edit');

        $response->assertStatus(200)
            ->assertViewIs('teams.edit')
            ->assertSee($team->name)
            ->assertSee($team->level)
            ->assertSee($team->where)
            ->assertSee($team->wanted);
        
        $name = Str::random(10); //nameのみ更新するので、name変数を定義

        $response = $this->put('teams/'.$team->id, [
            'name' => $name, //nameを変更。他はそのまま据置。
            'status' =>$team->status,
            'level' => $team->level,
            'goal' => $team->goal,
            'where' => $team->where,
            'where_city' => $team->where_city,
            'where_detail' => null,
            'frequency' => $team->frequency,
            'people' => $team->people,
            'wanted' => $team->wanted,
            'description' => $team->description,
            'image' => null ,
            'user_id' => $team->user_id,
        ]);

        $response->assertRedirect('teams');  // indexへリダイレクト

        $this->assertDatabaseHas('teams', ['name' => $name]); // DBにデータが保存されているか確認
    }

//作成データの削除挙動を確認
    public function testCanDelete()
    {
        $user = factory(User::class)->create();
        $response = $this
            ->actingAs($user); // ファクトリで作ったユーザーデータでログイン中状態を作る

        $team = factory(Team::class)->create();
        $this->assertDatabaseHas('teams', ['id' => $team->id]); // テスト前にレコードがDBに存在することを確認

        $response = $this->delete('teams/' . $team->id);
        $response->assertRedirect('teams');

        $this->assertDatabaseMissing('teams', ['id' => $team->id]); //削除処理の確認（ DELETEルートにアクセス後、DBからレコードがなくなっているかどうか）
    }
}