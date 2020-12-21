@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8 posts-show-main bg-white shadow">
      <div class="posts-show-body">
        <h1>{{$post->title}}</h1>
        <p class="display2">カテゴリ：{{$post->category}}</p>
        <p class="display2">投稿者：{{$post->user->name}}</p>
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

      <div class="comment-list">
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
        
          </div>
          @endforeach
        @else
          コメントはありません
        @endif
      </div>

      <div class="posts-show-body">
        <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
        @csrf
          <div class="form-group row">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <textarea id="body" rows='4' class="form-control @error('body') is-invalid @enderror samazon-login-input" name="body"  placeholder="400文字以内.."></textarea>
            @error('body')
              @foreach ($errors->get('body') as $error)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $error }}</strong>
                </span>
              @endforeach
            @enderror
            <button type="submit" class="btn samazon-submit-button w-100">コメント投稿</button>
          </div>
        </form>
     </div>
    </div>
  </div>

@endsection