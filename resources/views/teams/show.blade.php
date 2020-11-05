@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-4">
    @if(config('const.env') == "local" && $team->image !== "")
      <img src="{{ asset('storage/team/'.$team->image) }}" class="h-10 img-fluid">
    @endif
    @if (config('const.env') == "production" && $team->image !== "")
      <img src="{{ Storage::disk('s3')->url($team->image) }}" class="h-10 img-fluid">
    @endif
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-5">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>項目</th>
          <th>内容</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table">
          <th scope="row">チーム名</th>
          <td style="width:50%">{{$team->name}}</td>
        </tr>
        <tr>
          <th scope="row">募集状況</th>
          <td>{{$team->status}}</td>
        </tr>
        <tr>
          <th scope="row">レベル</th>
          <td>{{$team->level}}</td>
        </tr>
        <tr>
          <th scope="row">チームの目標</th>
          <td>{{$team->goal}}</td>
        </tr>
        <tr>
          <th scope="row">活動場所</th>
          <td>{{$team->where}}{{$team->where_city}}  {{$team->where_detail}}</td>
        </tr>
        <tr>
          <th scope="row">活動頻度</th>
          <td>{{$team->frequency}}</td>
        </tr>
        <tr>
          <th scope="row">活動人数</th>
          <td>{{$team->people}}</td>
        </tr>
        <tr>
          <th scope="row">こんな人を募集します</th>
          <td>{{$team->wanted}}</td>
        </tr>
        <tr>
          <th scope="row">チーム紹介</th>
          <td>{{$team->description}}</td>
        </tr>
        <tr>
          <th scope="row">投稿者</th>
          <td>{{$team->user->name}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@auth
  @if ($team->user_id === $user->id)
    <div class="row justify-content-center">
      <div class="col-5">
        <button type=“button” class= "btn samazon-edit-button btn-block" onclick="location.href='/teams/{{$team->id}}/edit'">編集する</button>
        <form action="/teams/{{ $team->id }}" method="POST" onsubmit="if(confirm('本当に削除してよろしいですか？')) { return true } else {return false };">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-warning btn-block">削除する</button>
        </form> 
      </div>    
    </div>
  @endif
@endauth
@endsection