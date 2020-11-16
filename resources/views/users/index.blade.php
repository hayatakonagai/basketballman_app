@extends('layouts.app')

@section('content')
<div class="container">
  <div class="form-group row justify-content-center">
    <div class = "search-form col-md-5 xs-10">
      <h2>プレイヤーを絞り込む<i class="fas fa-search"></i></h2>
      <form method="GET" action="{{route('users.index')}}" enctype="multipart/form-data">
        <label for="where" class="col-form-label text-md-left">カテゴリ：都道府県</label>
        <select id="where" class="form-control" name="where">
          <option value="" style="display: none;">選択してください</option>
          @foreach($prefs as $pref)
           <option value="{{$pref}}">{{$pref}}</option>
          @endforeach         
        </select>
        
        <br>
        <input type="submit" value="検索" class="btn btn-outline-success">
      </form>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-md-5 col-xs-10">
      @foreach($users as $user)
        <div class="main-list">
          <dl class="users-index">
            <dt>ユーザー</dt><dd><a href="{{route('users.show',['id'=>$user->id])}}">{{$user->name}}</a></dd>
            <dt>性別</dt><dd>{{$user->gender}}</dd>
            <dt>年齢</dt><dd>{{$user->age}}</dd>
            <dt>身長</dt><dd>{{$user->height}}</dd>
            <dt>ポジション</dt><dd>{{$user->position}}</dd>
            <dt>活動希望場所</dt><dd>{{$user->where}}</dd>
            <div class ="index-img">
              @if (config('const.env') == "local" && $user->image !== "")
                <img src="{{ asset('storage/user/'.$user->image) }}"style=width:150px>
              @endif
              @if (config('const.env') == "production" && $user->image !== "")
                <img src="{{ Storage::disk('s3')->url($user->image) }}" style=width:150px>
              @endif
            </div>
          </dl>
        </div>
      @endforeach
      {{ $users->links() }}
    </div>
  </div>
</div>
@endsection