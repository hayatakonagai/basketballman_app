@extends('layouts.app')

@section('content')
<div class="container-toppage">
    <div class="jumbotron jumbotron-extend">
         <h1>Hoop-member</h1>
    </div>
    <div class="row justify-content-center">
        <div class="toppage-description col-md-3 text-center">
            <i class="fas fa-user-plus fa-6x"></i>
            <a href="{{route('teams.create')}}"><h2>新規メンバー募集</h2></a>
            <p>新規メンバー募集の投稿を行います</p>
            <p><a href="{{ route('login') }}">※ログイン</a>が必要です</p>
        </div>
        <div class="toppage-description col-md-3 offset-1 text-center">
            <i class="fas fa-users fa-6x"></i>
            <a href="{{route('teams.index')}}"><h2>チームを探す</h2></a>
            <p>登録されているチームの一覧を表示します</p>
            <p>チームの代表者へメールを送ることができます</p>
            </div>
        <div class="toppage-description col-md-3 offset-1 text-center">
            <i class="fas fa-user fa-6x"></i>
            <a href="{{route('users.index')}}"><h2>プレイヤーを探す</h2></a>
            <p>登録されているユーザーの一覧を表示します</p>
            <p>ユーザーへメールを送ることができます</p>
        </div>
    </div>
</div>
@endsection