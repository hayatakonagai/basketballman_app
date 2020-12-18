@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="user-index-image col-12" >
          <p>Find a Tactics</p>
      </div>
  </div>

  @guest
  <div class="row justify-content-center">
        <div class="wrapper-link-button col-md-4 xs-10" >
            <a class="link-button" href="{{ route('register') }}">
                新規投稿はこちら
            </a>
        </div>
    </div>
  @endguest
{{--
  <div class="row">
    <div class="form-group col-md-5 xs-10 order-md-2">
      <div class = "search-form">
        <h2>絞り込み検索<i class="fas fa-search"></i></h2>
        <form method="GET" action="{{route('users.index')}}" enctype="multipart/form-data">
          <label for="gender" class="col-form-label text-md-left">カテゴリ：性別</label>
          <select id="gender" class="form-control" name="gender">
            <option value="" style="display: none;">選択してください</option>
            @foreach($genders as $gender)
              <option value="{{$gender}}">{{$gender}}</option>
            @endforeach         
          </select>
          <br>

          <label for="where" class="col-form-label text-md-left">カテゴリ：都道府県</label>
          <select id="where" class="form-control" name="where">
            <option value="" style="display: none;">選択してください</option>
              @foreach($prefs as $pref)
            <option value="{{$pref}}">{{$pref}}</option>
            @endforeach         
          </select>
          <br>

          <label for="gender" class="col-form-label text-md-left">カテゴリ：身長</label>
          <select id="gender" class="form-control" name="height">
            <option value="" style="display: none;">選択してください</option>
            @foreach($heights as $height)
             <option value="{{$height}}">{{$height}}cm以上</option>
            @endforeach         
          </select>
          <br>
          <input type="submit" value="検索" class="btn btn-outline-success">
        </form>
      </div>
    </div>
    --}}
    <div class="col-md-6 col-xs-10 order-md-1">
      <h2>投稿一覧</h2>
      @foreach($posts as $post)
        <div class="main-list">
          <dl class="users-index">
            <dt>タイトル</dt><dd><a href="{{route('posts.show',['id'=>$post->id])}}">{{$post->title}}</a></dd>
            <dt>カテゴリ</dt><dd>{{$post->category}}</dd>
            <dt>カテゴリ</dt><dd>{{$post->user->name}}</dd>
          </dl>
        </div>
      @endforeach

    </div>
  </div>
</div>
@endsection