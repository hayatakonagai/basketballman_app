@extends('layouts.app')
@section('content')
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
            <td style="width:50%">{{$post->title}}</td>
          </tr>
          <tr>
            <th scope="row">募集状況</th>
            <td>{{$post->category}}</td>
          </tr>
          <tr>
            <th scope="row">参考動画</th>
            <td><?php echo $post->url ?></td>
          </tr>
          <tr>
            <th scope="row">チームの目標</th>
            <td>{{$post->user->id}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @endsection