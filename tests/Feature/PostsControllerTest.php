<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    //未ログイン時のルーティング
    public function testIndexCanSee()
    {
        $post = factory(Post::class)->create();

        $response = $this
            ->get('/posts');

        $response->assertStatus(200)
            ->assertViewIs('posts.index')
            ->assertSee($post->name)
            ->assertSee($post->level)
            ->assertSee($post->where)
            ->assertSee($post->wanted);
    }

 //作成されたチームデータがshowページに反映されているか（閲覧できるか）   
    public function testCanSeeShow()
    {
        $post = factory(Post::class)->create();

        $response = $this
        ->get('/posts/'.$post->id);

        $response->assertStatus(200)
        ->assertViewIs('posts.show')
        ->assertsee($post->name)
        ->assertSee($post->user->name); //リレーション（Userモデル）
    }

    //フォームリクエストの挙動を確認
    public function testCanCreate()
    {
        $user = factory(User::class)->create();//ファクトリでユーザーデータを作成

        $response = $this
            ->actingAs($user) // ファクトリで作ったユーザーデータでログイン中状態を作る
            ->get('/posts/create');

        $response->assertStatus(200)
            ->assertViewIs('posts.create');
            
        $response = $this->post('/posts', [
            'title' => 'ディフェンスの練習',
            'category' => '練習方法',
            'body' => 'この動画を見て学びましょう',
            'url' => 'https://www.youtube.com/watch?v=HT64Hcj8wT8&t=85s',
            'user_id' => $user->id ,
            ],
        );
        
        $response->assertRedirect('posts');  // indexへリダイレクト

        $this->assertDatabaseHas('posts', ['title' => 'ディフェンスの練習']); // DBにデータが保存されているか確認
    }

//作成データの削除挙動を確認
public function testCanDelete()
{
    $user = factory(user::class)->create();
    $response = $this
        ->actingAs($user); // ファクトリで作ったユーザーデータでログイン中状態を作る

    $post = factory(Post::class)->create();
    $this->assertDatabaseHas('posts', ['id' => $post->id]); // テスト前にレコードがDBに存在することを確認

    $response = $this->delete('posts/' . $post->id);
    $response->assertRedirect('posts');

    $this->assertDatabaseMissing('posts', ['id' => $post->id]); //削除処理の確認（ DELETEルートにアクセス後、DBからレコードがなくなっているかどうか）
}
}
