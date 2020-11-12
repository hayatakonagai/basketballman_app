@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-3">
    <div class="mypage">
        <h1>マイページ</h1>
        <hr>
            @if (config('const.env') == "local" && $user->image !== "")
               <img src="{{ asset('storage/user/'.$user->image) }}" class="h-10 img-fluid">
            @endif
            @if (config('const.env') == "production" && $user->image !== "")
                <img src="{{ Storage::disk('s3')->url($user->image) }}" class="h-10 img-fluid">
            @endif
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-user fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ml-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="name-edit">会員情報の編集</label>
                            <p>アカウント情報の編集</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{route('mypage.edit')}}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ml-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="team-edit">運営チーム情報の編集</label>
                            <p>登録しているチーム情報を編集できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-envelope fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ml-3 mt-3">
                        <div class="d-flex flex-column">
                            <label for="messeage">メッセージ</label>
                            <p>メッセージのやり取りができます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                <a href="#">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
                <hr>

                <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-history fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ml-3 mt-3">
                        <div class="d-flex flex-column">
                            <label for="history">閲覧履歴</label>
                            <p>閲覧したチームを確認できます</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="#">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
                <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-lock fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ml-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">パスワード変更</label>
                            <p>パスワードを変更します</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                <a href="{{route('mypage.edit_password')}}">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row">
                    <div class="col-2 d-flex align-items-center">
                        <i class="fas fa-sign-out-alt fa-3x"></i>
                    </div>
                    <div class="col-9 d-flex align-items-center ml-2 mt-3">
                        <div class="d-flex flex-column">
                            <label for="user-name">ログアウト</label>
                            <p>ログアウトします</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-chevron-right fa-2x"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <hr>
    </div>
</div>
@endsection