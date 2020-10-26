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
                      <button type="submit" class="btn samazon-submit-button w-100">
                         会員情報の更新
                      </button>

                </div>
            </form>
        </div>
    </div>
</div>
 {{--               @csrf
               
                <div class="form-group row">
                    <label for="name" class="col-md-5 col-form-label text-md-left">氏名<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror samazon-login-input" name="name" value="{{$user->name}}" required autocomplete="name" autofocus placeholder="バスケ 太郎">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samazon-login-input" name="email" value="{{$user->email}}" required autocomplete="email" placeholder="basketball.gmail.com">

                        @error('email')
                        @foreach ($errors->get('email') as $error)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $error }}</strong>
                        </span>
                        @endforeach

                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-md-5 col-form-label text-md-left">性別<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <select id="gender" class="form-control @error('gender') is-invalid @enderror samazon-login-input" name="gender">
                            <option value="" style="display: none;">選択してください</option>
                            <option value="male" @if(old('gender') == 'male') selected @endif>男性</option>
                            <option value="female" @if(old('gender') == 'female') selected @endif>女性</option>
                            </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>性別を選択して下さい</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="height" class="col-md-5 col-form-label text-md-left">身長<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror samazon-login-input" name="height" value="{{$user->height}}" placeholder="cm">

                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>身長を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="weight" class="col-md-5 col-form-label text-md-left">体重<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

                    <div class="col-md-7">
                        <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror samazon-login-input" name="weight" value="{{ $user->weight}}"  placeholder="kg">

                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>体重を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="age" class="col-md-5 col-form-label text-md-left">年齢<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror samazon-login-input" name="age" value="{{$user->age}}" >

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>年齢を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="where" class="col-md-5 col-form-label text-md-left">活動希望地域<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <select id="where" class="form-control @error('where') is-invalid @enderror samazon-login-input" name="where" value="{{$user->where}}">
                        <option value="" style="display: none;">選択してください</option>
                            @foreach(\App\Team::WHERE as $where)
                             <option value="{{$where}}" {{ $where == old('where') ? 'selected' : '' }}>{{$where}}</option>
                             @endforeach
                            </select>
                        @error('where')
                        <span class="invalid-feedback" role="alert">
                            <strong>都道府県を選択して下さい</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="position" class="col-md-5 col-form-label text-md-left">ポジション<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <label for="PG"><input id="PG" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="PG"  {{ old('position') == 'PG' ? 'checked' : '' }}>PG</label>
                        <label for="SG"><input id="SG" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="SG" {{ old('position') == 'SG' ? 'checked' : '' }}>SG</label>
                        <label for="SF"><input id="SF" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="SF" {{ old('position') == 'SF' ? 'checked' : '' }}>SF</label>
                        <label for="PF"><input id="PF" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="PF" {{ old('position') == 'PF' ? 'checked' : '' }}>PF</label>
                        <label for="C"><input id="C" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="C" {{ old('position') == 'C' ? 'checked' : '' }}>C</label>

                        @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>1つ選択してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="carrer" class="col-md-5 col-form-label text-md-left">バスケ経験<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <label for="inexperienced"><input id="inexperienced" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="未経験" {{ old('carrer') == '未経験' ? 'checked' : '' }}>未経験</label>
                        <label for="juniorHigh"><input id="juniorHigh" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="中学まで" {{ old('carrer') == '中学まで' ? 'checked' : '' }}>中学校まで</label>
                        <label for="high"><input id="high" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="高校まで" {{ old('carrer') == '高校まで' ? 'checked' : '' }}>高校まで</label>
                        <label for="univercity"><input id="univercity" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="大学まで" {{ old('carrer') == '大学まで' ? 'checked' : '' }}>大学まで</label>
                        <label for="club"><input id="club" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="クラブチーム" {{ old('carrer') == 'クラブチーム' ? 'checked' : '' }}>クラブチーム</label>
                        <label for="company"><input id="company" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="実業団" {{ old('carrer') == '実業団' ? 'checked' : '' }}>実業団</label>

                        @error('carrer')
                        <span class="invalid-feedback" role="alert">
                            <strong>１つ以上選択してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="acievement" class="col-md-5 col-form-label text-md-left">実績<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

                    <div class="col-md-7">
                        <textarea id="acievement" rows='4' class="form-control @error('acievement') is-invalid @enderror samazon-login-input" name="acievement" value="{{$user->acievement}}"  placeholder="インターハイ出場etc.."></textarea>

                        @error('acievement')
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="appeal" class="col-md-5 col-form-label text-md-left">アピール<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

                    <div class="col-md-7">
                        <textarea id="appeal" rows='4' class="form-control @error('acievement') is-invalid @enderror samazon-login-input" name="appeal" value="{{ $user->appeal}}">
                        </textarea>
                        @error('appeal')
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        @enderror
                    </div>
                </div>
--}}







{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <span>
                <a href="{{ route('mypage') }}">マイページ</a> > 会員情報の編集
            </span>

            <h1 class="mt-3 mb-3">会員情報の編集</h1>

            <hr>

            <form method="POST" action="/users/mypage">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="name" class="text-md-left samazon-edit-user-info-label">氏名</label>
                        <span onclick="switchEditUserInfo('.userName', '.editUserName', '.userNameEditLabel');" class="userNameEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userName">
                        <h1 class="samazon-edit-user-info-value">{{ $user->name }}</h1>
                    </div>
                    <div class="collapse editUserName">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus placeholder="バスケ 太郎">

                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>               

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>氏名を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="email" class="text-md-left samazon-edit-user-info-label">メールアドレス</label>
                        <span onclick="switchEditUserInfo('.userMail', '.editUserMail', '.userMailEditLabel');" class="userMailEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userMail">
                        <h1 class="samazon-edit-user-info-value">{{ $user->email }}</h1>
                    </div>
                    <div class="collapse editUserMail">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="samurai@samurai.com">

                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>メールアドレスを入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="height" class="text-md-left samazon-edit-user-info-label">身長</label>
                        <span onclick="switchEditUserInfo('.userHeight', '.editUserHeight', 'userHeightEditLabel');" class="userHeightEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userHeight">
                        <h1 class="samazon-edit-user-info-value">{{ $user->height }}</h1>
                    </div>
                    <div class="collapse editUserHeight">
                        <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $user->height }}" required autocomplete="height" autofocus placeholder="cm">

                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>身長を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="weight" class="text-md-left samazon-edit-user-info-label">体重</label>
                        <span onclick="switchEditUserInfo('.userWeight', '.editUserWeight', 'userWeightEditLabel');" class="userWeightEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userWeight">
                        <h1 class="samazon-edit-user-info-value">{{ $user->weight }}</h1>
                    </div>
                    <div class="collapse editUserWeight">
                        <input id="weight" type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ $user->weight }}" required autocomplete="weight" autofocus placeholder="cm">

                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('weight')
                        <span class="invalid-feedback" role="alert">
                            <strong>体重を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="height" class="text-md-left samazon-edit-user-info-label">身長</label>
                        <span onclick="switchEditUserInfo('.userHeight', '.editUserHeight', 'userHeightEditLabel');" class="userHeightEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userHeight">
                        <h1 class="samazon-edit-user-info-value">{{ $user->height }}</h1>
                    </div>
                    <div class="collapse editUserHeight">
                        <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $user->height }}" required autocomplete="height" autofocus placeholder="cm">

                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>身長を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="height" class="text-md-left samazon-edit-user-info-label">身長</label>
                        <span onclick="switchEditUserInfo('.userHeight', '.editUserHeight', 'userHeightEditLabel');" class="userHeightEditLabel user-edit-label">
                            編集
                        </span>
                    </div>
                    <div class="collapse show userHeight">
                        <h1 class="samazon-edit-user-info-value">{{ $user->height }}</h1>
                    </div>
                    <div class="collapse editUserHeight">
                        <input id="height" type="text" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $user->height }}" required autocomplete="height" autofocus placeholder="cm">

                        <button type="submit" class="btn samazon-submit-button mt-3 w-25">
                            保存
                        </button>

                        @error('height')
                        <span class="invalid-feedback" role="alert">
                            <strong>身長を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <hr>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    let switchEditUserInfo = (textClass, inputClass, labelClass) => {
        if ($(textClass).css('display') == 'block') {
            $(labelClass).text("キャンセル");
            $(textClass).collapse('hide');
            $(inputClass).collapse('show');
        } else {
            $(labelClass).text("編集");
            $(textClass).collapse('show');
            $(inputClass).collapse('hide');
        }
    }
</script> --}}
@endsection