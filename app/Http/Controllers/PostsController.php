<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(Request $request)
    {
        $key_category = $request->input('category');

        if(isset($key_category)){
            $posts = Post::where('category',$key_category)->paginate(3);
            $categories = config('category');
            return view('posts.index',compact('posts','categories'));
            }
        else{
            $posts = Post::orderBy('created_at', 'desc')->get();
            $categories = config('category');
            return view('posts.index',compact('posts','categories'));
        }
    }

    public function create()
    {
        $user = Auth::user();
        return view(('posts.create'),compact('user'));
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'category' =>'required',
            'body' => 'required|max:2000',
            'url' =>'nullable',
        ]);

        $post= new Post;
        $user = Auth::user();
        $post->title =$request->title;
        $post->category =$request->category;
        $post->body =$request->body;
        $post->url =$request->url;
        $post->user_id = $user->id;

        $post->save();
        return redirect()->route('posts.index');
    }

    public function show(Post $post , User $user)
    {
        $user = User::all();
        $comments = Comment::where('post_id',$post->id)->get();
        return view('posts.show',compact('post','user','comments'));
    }

    public function destroy($id)
    {
             $post = Post::find($id);
             $post->delete();
             return redirect()->route('posts.index');
    }
}
