@extends('layouts.app')
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="team-show-list">
        <h2><span class="border-bottom border-dark">チーム{{$team->name}}の募集情報</span></h2>
        <p>{{$team->where}}のバスケチームです。</p>
        <p>チームのレベルとしては{{$team->level}}です。</p>
        <p>募集しているのは、{{$team->wanted}}です。興味がある方は、お気軽にメッセージをお送りください。</p>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-4 bg-white">
      @if(config('const.env') == "local" && $team->image !== "")
        <img src="{{ asset('storage/team/'.$team->image) }}" class="img-fluid";>
      @endif
      @if (config('const.env') == "production" && $team->image !== "")
        <img src="{{ Storage::disk('s3')->url($team->image) }}" class="img-fluid">
      @endif
    </div>
  </div>
  <br>
  <div class="row justify-content-center">
    <div class="col-md-5">
      <table class="table table-bordered bg-white">
        <thead>
          <tr>
            <th>項目</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
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
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <button type="button" class="btn samazon-submit-button"onclick="location.href='mailto:{{$team->user->email}}?subject=【{{config('app.name')}}】応募フォーム&body=【氏名】{{$user->name}} %0D%0A 【性別】{{$user->gender}}%0D%0A 【身長】{{$user->height}}%0D%0A 【年齢】{{$user->age}}%0D%0A 【ポジション】{{$user->position}}%0D%0A【経験】{{$user->carrer}}%0D%0A【実績】{{$user->acievement}}%0D%0A 【アピール】{{$user->appeal}}%0D%0A 【チーム代表者へメッセージ】'">
        <i class="fas fa-envelope fa-3x"></i><h5>チーム代表者へメールを送る</h5></a>
        </button>
      </div>
    </div>
    @if ($team->user_id === $user->id)
      <div class="row justify-content-center">
        <div class="col-md-5">
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
  @if(Auth::guest())
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <button type="button" class="btn samazon-submit-button" onclick="location.href='/login'">
        <i class="fas fa-envelope fa-3x"></i><h5>チーム代表者へメールを送る</h5></a>
        </button>
      </div>
    </div>
  @endif
@endsection