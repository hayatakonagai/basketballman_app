@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="user-index-image col-12" >
          <p>Find a Tactics</p>
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

  <div class="row">
    <div class="form-group col-md-5 xs-10 order-md-2">
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

    <div class="col-md-6 col-xs-10 order-md-1">
      <h2>投稿一覧</h2>
      @foreach($posts as $post)
        <div class="main-list">
          <dl class="users-index">
            <dt>タイトル</dt><dd><a href="{{route('posts.show',['id'=>$post->id])}}">{{$post->title}}</a></dd>
            <dt>カテゴリ</dt><dd>{{$post->category}}</dd>
            <dt>投稿者</dt><dd>{{$post->user->name}}</dd>
            <dt>投稿日</dt><dd>{{$post->created_at}}</dd>
          </dl>
        </div>
      @endforeach

    </div>
  </div>
</div>
@endsection