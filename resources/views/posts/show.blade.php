@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8 posts-show-main bg-white shadow">
      <div class="posts-show-body">
        <h1>{{$post->title}}</h1>
        <p class="display2">カテゴリ：{{$post->category}}</p>
        <p class="display2">投稿者：{{$post->user->name}}</p>
        @if ( Auth::check() && $post->user->id == Auth::user()->id)
          <div class = "delete-form text-right">
            <form action="/posts/{{ $post->id }}" method="POST" onsubmit="if(confirm('本当に削除してよろしいですか？')) { return true } else {return false };">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="delete-button btn btn-warning">削除</button>
            </form> 
         </div>
        @endif
      </div>
      <div class="posts-show-body">
        <p  class ="display2">{{$post->body}}</p>
      </div>
      <div class="posts-show-body">
        <h2>参考動画</h2>
        @if(isset($post->url))
          <?php $embed_url = substr($post->url,(strpos($post->url, "=")+1)); ?>
          <?php $youtube_url = "<iframe width=\"60%\" height=\"400\" src=\"https://www.youtube.com/embed/$embed_url\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>" ?>
          <?php echo $youtube_url ?>
        @endif
      </div>
      @auth
      <div>
        @if($like_model->like_exist(Auth::user()->id,$post->id))
        <p class="favorite-marke">
          <a class="js-like-toggle liked" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart fa-2x"></i></a>
          <span class="likesCount" >{{$post->likes_count}}</span>
        </p>
        @else
        <p class="favorite-marke">
          <a class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart fa-2x"></i></a>
          <span class="likesCount">{{$post->likes_count}}</span>
        </p>
        @endif​
      </div>
      @endauth
      <div class="comment-wrapper">
      <h2>コメント一覧</h2>
        @if(isset($comments))
          @foreach($comments as $comment)
          <div class="comment-body">
            @if (config('const.env') == "local" && $comment->user->image !== "")
              <img src="{{ asset('storage/user/'.$comment->user->image) }}" style=width:50px;>
            @endif
            @if (config('const.env') == "production" && $comment->user->image !== "")
              <img src="{{ Storage::disk('s3')->url($comment->user->image) }}"style=width:50px;>
            @endif
            <a href="{{route('users.show',['id'=>$comment->user->id])}}">{{$comment->user->name}}</a>
            {{$comment->created_at}}
            <br>
            {{$comment->body}}
            @if (Auth::check() && $comment->user->id == Auth::user()->id)
            <div class = "delete-form text-right">
              <form name = "comment_delete" action="/comments/{{ $comment->id }}" method="POST" onsubmit="if(confirm('本当に削除してよろしいですか？')) { return true } else {return false };">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="delete-button btn btn-warning">削除</button>
              </form> 
            </div>
            @endif
          </div>
          @endforeach
        @else
          コメントはありません
        @endif
      </div>
      @auth
        <div class="posts-show-body">
          <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
          @csrf
            <div class="form-group row">
              <input type="hidden" name="post_id" value="{{$post->id}}">
              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
              <textarea id="body" rows='4' class="form-control @error('body') is-invalid @enderror basketball_app-login-input" name="body"  placeholder="400文字以内.."></textarea>
              @error('body')
                @foreach ($errors->get('body') as $error)
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $error }}</strong>
                  </span>
                @endforeach
              @enderror
              <button type="submit" class="btn basketball_app-submit-button w-100">コメント投稿</button>
            </div>
          </form>
        </div>
      @endauth
    </div>
  </div>

@endsection