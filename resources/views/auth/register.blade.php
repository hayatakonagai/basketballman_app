@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3">新規会員登録</h3>

            <hr>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          
                @include('users.sections.form')

                <div class="form-group row">
                    <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>
                    <div class="col-md-7">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror samazon-login-input" name="password" required autocomplete="new-password">

                        @error('password')
                        @foreach ($errors->get('password') as $error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                        @endforeach
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-5 col-form-label text-md-left">バスワード（確認）</label>

                    <div class="col-md-7">
                        <input id="password-confirm" type="password" class="form-control samazon-login-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn samazon-submit-button w-100">
                        アカウント作成
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection