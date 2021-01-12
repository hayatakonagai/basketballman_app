@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
      <div class="user-index-image col-12" >
          <p>Improve your skills</p>
      </div>
  </div>
  @auth
  <div class="row justify-content-center">
        <div class="wrapper-link-button col-md-4 xs-10" >
            <a class="link-button" href="{{ route('posts.create') }}">
                新規投稿はこちら
            </a>
        </div>
    </div>
  @endauth
  <!--検索機能-->
  <div class="row">
    <div class="form-group col-md-4 xs-10 order-md-2">
      <div class = "search-form">
        <h2>絞り込み検索<i class="fas fa-search"></i></h2>
        <form method="GET" action="{{route('posts.index')}}" enctype="multipart/form-data">
          <label for="category" class="col-form-label text-md-left">カテゴリ</label>
          <select id="category" class="form-control" name="category">
            <option value="" style="display: none;">選択してください</option>
            @foreach($categories as $category)
              <option value="{{$category}}">{{$category}}</option>
            @endforeach         
          </select>
          <br>
          <input type="submit" value="検索" class="btn btn-outline-success">
        </form>
      </div>
    </div>

    <!--投稿一覧-->
    <div class="col-md-8 col-xs-10 order-md-1">
      <h2>投稿一覧</h2>
      @foreach($posts as $post)
        <div class="bbs bg-white shadow lead">
          <div class = "bg-success text-light float-right px-4">
          {{$post->category}}
          </div>
          <div class ="bbs-image">
            @if (config('const.env') == "local" && $post->user->image !== "")
              <img src="{{ asset('storage/user/'.$post->user->image) }}" style=width:60px;>
            @endif
            @if (config('const.env') == "production" && $post->user->image !== "")
              <img src="{{ Storage::disk('s3')->url($post->user->image) }}"style=width:60px;>
            @endif
          </div>
          <h3><a href="{{route('posts.show',['id'=>$post->id])}}">{{$post->title}}</a></h3>
          投稿者：<a href="{{route('users.show',['id'=>$post->user->id])}}">{{$post->user->name}}</a>
          <br>
          投稿日{{$post->created_at}}
          <div class= text-center>
            @if(isset($post->url))
              <?php $embed_url = substr($post->url,(strpos($post->url, "=")+1)); ?>
              <?php $youtube_url = "<iframe width=\"60%\" height=\"250\" src=\"https://www.youtube.com/embed/$embed_url\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>" ?>
              <?php echo $youtube_url ?>
            @endif
          </div>
        </div>
        @auth
        @if($like_model->like_exist(Auth::user()->id,$post->id))
          <p class="favorite-marke">
            <a class="js-like-toggle liked" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart fa-2x"></i></a>
            <span class="likesCount">{{$post->likes_count}}</span>
          </p>
        @else
          <p class="favorite-marke">
            <a class="js-like-toggle" href="" data-postid="{{ $post->id }}"><i class="fas fa-heart fa-2x"></i></a>
            <span class="likesCount">{{$post->likes_count}}</span>
          </p>
        @endif​
        @endauth
      @endforeach
    </div>
  </div>
</div>
@endsection