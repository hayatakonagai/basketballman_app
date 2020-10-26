@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3">運営チーム一覧</h3>
            <hr>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            @foreach($teams as $team)
                <dl class="teams-index">
                    <dt>チーム名</dt><dd>{{$team->name}}</dd>
                    <dt>応募資格</dt><dd>{{$team->wanted}}</dd>
                    <dt>活動場所</dt><dd>{{$team->where}}</dd>
                    <dt>活動頻度</dt><dd>{{$team->frequency}}</dd>
                    <dt>更新日</dt><dd>{{$team->updated_at}}</dd>
                    <br>
                </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection