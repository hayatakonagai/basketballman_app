@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
  <div class="col-md-4 bg-white">
    @if(config('const.env') == "local" && $user->image !== "")
      <img src="{{ asset('storage/user/'.$user->image) }}" class="img-fluid";>
    @endif
    @if (config('const.env') == "production" && $user->image !== "")
      <img src="{{ Storage::disk('s3')->url($user->image) }}" class="img-fluid">
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
          <th scope="row">ユーザー名</th>
          <td style="width:50%">{{$user->name}}</td>
        </tr>
        <tr>
          <th scope="row">性別</th>
          <td>{{$user->gender}}</td>
        </tr>
        <tr>
          <th scope="row">年齢</th>
          <td>{{$user->age}}</td>
        </tr>
        <tr>
          <th scope="row">身長</th>
          <td>{{$user->height}}</td>
        </tr>
        <tr>
          <th scope="row">体重</th>
          <td>{{$user->weight}}</td>
        </tr>
        <tr>
          <th scope="row">活動希望場所</th>
          <td>{{$user->where}}</td>
        </tr>
        <tr>
          <th scope="row">ポジション</th>
          <td>{{$user->position}}</td>
        </tr>
        <tr>
          <th scope="row">バスケ経験</th>
          <td>{{$user->carrer}}</td>
        </tr>
        <tr>
          <th scope="row">実績</th>
          <td>{{$user->acievement}}</td>
        </tr>
        <tr>
          <th scope="row">アピールポイント</th>
          <td>{{$user->appeal}}</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

  @auth
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <button type="button" class="btn samazon-submit-button"onclick="location.href='mailto:{{$user->email}}?subject=【{{config('app.name')}}】お問い合わせ&body={{$user->name}}様 %0D%0A %0D%0A はじめまして。○○と申します。%0D%0A {{$user->name}}様のプロフィールを拝見しまして、ぜひチームへの加入を検討いただきたく、ご連絡させていただきました。%0D%0A %0D%0A【チームの詳細】%0D%0A （記載願います） %0D%0A %0D%0A ご検討いただければ幸いです。よろしくお願いします。'">
        <i class="fas fa-envelope fa-3x"></i><h5>このユーザーへメールを送る</h5></a>
        </button>
      </div>
    </div>
  @endauth
  @if(Auth::guest())
    <div class="row justify-content-center">
      <div class="col-md-5 text-center">
        <button type="button" class="btn samazon-submit-button" onclick="location.href='/login'">
        <i class="fas fa-envelope fa-3x"></i><h5>このユーザーへメールを送る</h5></a>
        </button>
      </div>
    </div>
  @endif
@endsection