@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <h3 class="mt-3 mb-3">登録チーム情報の編集</h3>

      <hr>

      <form method="POST" action="/teams/{{$team->id}}" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="PUT">

          <div class="form-group row">
            <label for="status" class="col-md-5 col-form-label text-md-left">募集状況<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

            <div class="col-md-7">
            @php
              $selectedStatus = old('status', !empty($team->status) ?  $team->status : '');
            @endphp
              <select id="status" class="form-control @error('status') is-invalid @enderror samazon-login-input" name="status">
                  <option value="募集中" @if($selectedStatus == '募集中') selected @endif>募集中</option>
                  <option value="応募終了" @if($selectedStatus == '応募終了') selected @endif>応募終了</option>
              </select>

              @error('status')
              <span class="invalid-feedback" role="alert">
                  <strong>選択して下さい</strong>
              </span>
              @enderror
          </div>
        </div>

          @include('teams.sections.form')

          <div class="form-group">
            <button type="submit" class="btn samazon-submit-button w-100">変更する</button>
          </div>
       </form>
    </div>
 </div>
</div>
@endsection
