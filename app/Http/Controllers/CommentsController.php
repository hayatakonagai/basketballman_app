<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $user = User::all();
        $post = Post::where('id',$request->post_id)->get();

        $comment= new Comment;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;

        $comment->save();
        
        return redirect()->route('posts.show',['id'=>$comment->post_id]);
        
    }
}
