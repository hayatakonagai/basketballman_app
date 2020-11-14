@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-5 col-xs-10">
            @foreach($teams as $team)
                <div class="main-list">
                    <dl class="teams-index">
                        <dt>チーム名</dt><dd><a href="{{route('teams.show',['id'=>$team->id])}}">{{$team->name}}</a></dd>
                        <dt>応募資格</dt><dd>{{$team->wanted}}</dd>
                        <dt>活動場所</dt><dd>{{$team->where}}</dd>
                        <dt>活動頻度</dt><dd>{{$team->frequency}}</dd>
                        <dt>更新日</dt><dd>{{$team->updated_at}}</dd>
                        <div class ="team-index-img">
                            @if (config('const.env') == "local" && $team->image !== "")
                                <img src="{{ asset('storage/team/'.$team->image) }}"style=width:150px>
                            @endif
                            @if (config('const.env') == "production" && $team->image !== "")
                                <img src="{{ Storage::disk('s3')->url($team->image) }}" style=width:150px>
                            @endif
                        </div>
                </div>
            @endforeach
            {{ $teams->links() }}
        </div>
    </div>
@endsection