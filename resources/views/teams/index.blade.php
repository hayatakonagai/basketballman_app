@extends('layouts.app')
@section('content')

<div class="container">
    @auth
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3"><a href="{{route('teams.create')}}">新規メンバー募集</a></h3>
            <hr>
        </div>
    </div>
    @endauth
    <div class="row justify-content-center">
        <div class="col-md-5">
            @foreach($teams as $team)
                <div class="main-list">
                    <dl class="teams-index">
                        <dt>チーム名</dt><dd><a href="{{route('teams.show',['id'=>$team->id])}}">{{$team->name}}</a></dd>
                        <dt>応募資格</dt><dd>{{$team->wanted}}</dd>
                        <dt>活動場所</dt><dd>{{$team->where}}</dd>
                        <dt>活動頻度</dt><dd>{{$team->frequency}}</dd>
                        <dt>更新日</dt><dd>{{$team->updated_at}}</dd>
                        <td>
                        @if ($team->image !== "")
                            <img src="{{ asset('storage/team/'.$team->image) }}" class="h-10 img-fluid">
                            @endif
                    </td>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection