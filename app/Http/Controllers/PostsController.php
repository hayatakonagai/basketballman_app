<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\Comment;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Request $request)
    {
        $key_category = $request->input('category');

        if(isset($key_category)){
            $posts = Post::withCount('likes')->where('category',$key_category)->paginate(3);
            $categories = config('category');
            $like_model = new Like;
            return view('posts.index',compact('posts','categories','like_model'));
            }
        else{
            $posts = Post::withCount('likes')->orderBy('created_at', 'desc')->get();
            $categories = config('category');
            $like_model = new Like;
            return view('posts.index',compact('posts','categories','like_model'));
        }
    }

    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) 
            {
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else
             {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }
      
        //イイね総数を獲得
        $postLikesCount = Post::withCount('likes')->findOrFail($post_id)->likes_count;

        $json = [
            'postLikesCount' => $postLikesCount,
        ];

        return response()->json($json);
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

    public function show(Post $post)
    {
        $user = User::all();
        $like_model = new Like;
        $comments = Comment::where('post_id',$post->id)->get();
        $post = Post::withCount('likes')->findOrFail($post->id);
        return view('posts.show',compact('post','user','comments','like_model'));
    }

    public function destroy($id)
    {
             $post = Post::find($id);
             $post->delete();
             return redirect()->route('posts.index');
    }
}
