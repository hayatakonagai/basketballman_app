@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('teams.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-5 col-form-label text-md-left">チーム名<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror samazon-login-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="アルバルク東京">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="level" class="col-md-5 col-form-label text-md-left">レベル<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <select id="level" class="form-control @error('level') is-invalid @enderror samazon-login-input" name="level" value="{{ old('level') }}">
                            <option value="" style="display: none;">選択してください</option>
                            <option value="初級">初級</option>
                            <option value="中級">中級</option>
                            <option value="上級">上級</option>
                            </select>
                        @error('level')
                        <span class="invalid-feedback" role="alert">
                            <strong>選択して下さい</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="goal" class="col-md-5 col-form-label text-md-left">チームの目標<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <textarea id="goal" type="text" class="form-control @error('goal') is-invalid @enderror samazon-login-input" name="goal" value="{{ old('goal') }}" required autocomplete="goal" autofocus placeholder="入力してください"></textarea>

                        @error('goal')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="where" class="col-md-5 col-form-label text-md-left">活動場所１<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <select id="where" class="form-control @error('where') is-invalid @enderror samazon-login-input" name="where" value="{{ old('where') }}">
                            <option value="" style="display: none;">選択してください</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                            </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>都道府県を選択して下さい</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="where_city" class="col-md-5 col-form-label text-md-left">活動場所２<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="where_city" type="text" class="form-control @error('where_city') is-invalid @enderror samazon-login-input" name="where_city" value="{{ old('where_city') }}"  placeholder="市区町村">

                        @error('where_city')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="where_detail" class="col-md-5 col-form-label text-md-left">活動場所３<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <input id="where_detail" type="text" class="form-control @error('where_detail') is-invalid @enderror samazon-login-input" name="where_detail" value="{{ old('where_detail') }}"  placeholder="○○体育館">

                        @error('where_detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="frequency" class="col-md-5 col-form-label text-md-left">活動頻度<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <select id="frequency" class="form-control @error('frequency') is-invalid @enderror samazon-login-input" name="frequency" value="{{ old('frequency') }}">
                            <option value="" style="display: none;">選択してください</option>
                            @foreach(\App\Team::FREQUENCY as $val)
                             <option value="{{$val}}">{{$val}}</option>
                             @endforeach
                            </select>
                        @error('frequency')
                        <span class="invalid-feedback" role="alert">
                            <strong>選択して下さい</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="weight" class="col-md-5 col-form-label text-md-left">体重<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

                    <div class="col-md-7">
                        <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror samazon-login-input" name="weight" value="{{ old('weight') }}"  placeholder="kg">

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
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror samazon-login-input" name="age" value="{{ old('age') }}" >

                        @error('age')
                        <span class="invalid-feedback" role="alert">
                            <strong>年齢を入力してください</strong>
                        </span>
                        @enderror
                    </div>
                </div>

 

                <div class="form-group row">
                    <label for="position" class="col-md-5 col-form-label text-md-left">ポジション<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

                    <div class="col-md-7">
                        <label for="PG"><input id="PG" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="PG">PG</label>
                        <label for="SG"><input id="SG" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="SG">SG</label>
                        <label for="SF"><input id="SF" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="SF">SF</label>
                        <label for="PF"><input id="PF" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="PF">PF</label>
                        <label for="C"><input id="C" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="C">C</label>

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
                        <label for="inexperienced"><input id="inexperienced" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="未経験">未経験</label>
                        <label for="juniorHigh"><input id="juniorHigh" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="中学まで">中学校まで</label>
                        <label for="high"><input id="high" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="高校まで">高校まで</label>
                        <label for="univercity"><input id="univercity" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="大学まで">大学まで</label>
                        <label for="club"><input id="club" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="クラブチーム">クラブチーム</label>
                        <label for="company"><input id="company" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer" value="実業団">実業団</label>

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
                        <input id="acievement" type="textarea" rows='4' class="form-control @error('acievement') is-invalid @enderror samazon-login-input" name="acievement" value="{{ old('acievement') }}"  placeholder="インターハイ出場etc..">

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
                        <input id="appeal" type="textarea" rows='4' class="form-control @error('acievement') is-invalid @enderror samazon-login-input" name="appeal" value="{{ old('acievement') }}">

                        @error('appeal')
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn samazon-submit-button w-50">
                        チーム作成
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection