@extends('layouts.app')
@section('content')
  <div class="col-4">
      <img src="{{ asset('storage/team/'.$team->image) }}" class="h-10 img-fluid">
</div>
<table class="table">
  <thead>
    <tr>
      <th>項目</th>
      <th>内容</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table">
      <th scope="row">チーム名</th>
      <td>{{$team->name}}</td>
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

<button type=“button” class= "btn samazon-edit-button w-20" onclick="location.href='/teams/{{$team->id}}/edit'">編集する</button>

@endsection