<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Support\Str;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCanSee()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id]);
        $comment = factory(Comment::class)->create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            ]);

        $response = $this
            ->actingAs($user) 
            ->get('/posts/'.$post->id);

        $response->assertStatus(200)
            ->assertViewIs('posts.show')
            ->assertSee($comment->body)
            ->assertSee($post->title)
            ->assertSee($user->name);
    }

    public function testCanCreate()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id]);

        $response = $this
            ->actingAs($user) 
            ->get('/posts/'.$post->id);
        
        $body = Str::random(50);

        $response = $this->post('/comments', [
            'body' => $body,
            'post_id' => $post->id ,
            'user_id' => $user->id ,
            ],
        );
        
        $response->assertRedirect('posts/'.$post->id); 

        $this->assertDatabaseHas('comments', ['body' => $body]); // DBにデータが保存されているか確認
    }    

    public function testCanDelete()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create(['user_id' => $user->id]);
        $comment = factory(Comment::class)->create([
            'post_id' => $post->id,
            'user_id' => $user->id,
            ]);

        $response = $this
            ->actingAs($user) // ファクトリで作ったユーザーデータでログイン中状態を作る
            ->get('/posts/'.$post->id);

        $response->assertStatus(200)
            ->assertViewIs('posts.show');
    
        $response = $this->delete('comments/' . $comment->id);

        $response->assertRedirect('posts/'.$comment->post_id);
    
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]); //削除処理の確認（ DELETEルートにアクセス後、DBからレコードがなくなっているかどうか）
    }

}
