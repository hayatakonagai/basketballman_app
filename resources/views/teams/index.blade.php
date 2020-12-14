@extends('layouts.app')
@section('content')

@auth
    <div class="row justify-content-center">
        <div class="col-md-5 col-xs-10">
            <h3 class="mt-3 mb-3 ml-3"><a href="{{route('teams.create')}}">新規メンバー募集</a></h3>
            <hr>
        </div>
    </div>
@endauth
<div class="container">
    <div class="form-group row justify-content-center">
        <div class = "search-form col-md-5 xs-10">
            <h2>チームを絞り込む<i class="fas fa-search"></i></h2>
            <form method="GET" action="{{route('teams.index')}}" enctype="multipart/form-data">
                <label for="where" class="col-form-label text-md-left">カテゴリ：都道府県</label>
                <select id="where" class="form-control" name="where">
                    <option value="" style="display: none;">選択してください</option>
                    @foreach($prefs as $pref)
                    <option value="{{$pref}}">{{$pref}}</option>
                    @endforeach         
                </select>
                <br>

                <label for="level" class="col-form-label text-md-left">カテゴリ：レベル</label>
                <select id="level" class="form-control" name="level">
                    <option value="" style="display: none;">選択してください</option>
                    @foreach($levels as $level)
                    <option value="{{$level}}">{{$level}}</option>
                    @endforeach         
                </select>
                <br>

                <input type="submit" value="検索" class="btn btn-outline-success">
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5 col-xs-10">
            @foreach($teams as $team)
                <div class="main-list">
                    <dl class="teams-index">
                        <dt>チーム名</dt><dd><a href="{{route('teams.show',['id'=>$team->id])}}">{{$team->name}}</a></dd>
                        <dt>活動場所</dt><dd>{{$team->where}}</dd>
                        <dt>レベル</dt><dd>{{$team->level}}</dd>
                        <dt>応募資格</dt><dd>{{$team->wanted}}</dd>
                        <dt>更新日</dt><dd>{{$team->updated_at}}</dd>
                        <div class ="index-img">
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
</div>
@endsection