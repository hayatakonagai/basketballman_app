@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3">会員登録情報の編集</h3>

            <hr>

            <form method="POST" action="/users/mypage" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">

                    @include('users.sections.form')

                    <div class="form-group">
                      <button type="submit" class="btn basketball_app-submit-button w-100">
                         会員情報の更新
                      </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection