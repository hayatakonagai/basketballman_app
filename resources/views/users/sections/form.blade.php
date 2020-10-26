@csrf

<div class="form-group row">
    <label for="name" class="col-md-5 col-form-label text-md-left">氏名<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror samazon-login-input" name="name" value="{{ !empty($user->name) ?  $user->name : old('name')}}"  required autocomplete="name" autofocus placeholder="バスケ 太郎">

        @error('name')
        @foreach ($errors->get('name') as $error)
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
        @php
          $selectedGender = !empty($user) ?  $user->gender : old('gender');
        @endphp
        <select id="gender" class="form-control @error('gender') is-invalid @enderror samazon-login-input" name="gender">
            <option value="" style="display: none;">選択してください</option>
            <option value="male" @if ($selectedGender == 'male') selected @endif>男性</option>
            <option value="female" @if($selectedGender == 'female') selected @endif>女性</option>
            </select>

        @error('gender')
        @foreach ($errors->get('gender') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="height" class="col-md-5 col-form-label text-md-left">身長<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror samazon-login-input" name="height" value="{{ !empty($user) ?  $user->height :  old('height') }}"  placeholder="cm">

        @error('height')
        @foreach ($errors->get('height') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="weight" class="col-md-5 col-form-label text-md-left">体重<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror samazon-login-input" name="weight" value="{{ !empty($user->weight) ? $user->weight : old('weight')}}"  placeholder="kg">

        @error('weight')
        @foreach ($errors->get('weight') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="age" class="col-md-5 col-form-label text-md-left">年齢<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror samazon-login-input" name="age" value="{{ !empty($user->age) ?  $user->age :  old('age') }}" >

        @error('age')
        @foreach ($errors->get('age') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="where" class="col-md-5 col-form-label text-md-left">活動希望地域<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        @php
          $selectedWhere = !empty($user->where) ?  $user->where : old('where');
        @endphp
        <select id="where" class="form-control @error('where') is-invalid @enderror samazon-login-input" name="where" value="{{ old('where') }}">
        <option value="" style="display: none;">選択してください</option>
            @foreach(\App\Team::WHERE as $where)
             <option value="{{$where}}"  @if ($selectedWhere == $where) selected @endif>{{$where}}</option>

             @endforeach
            </select>

        @error('where')
        @foreach ($errors->get('where') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>都道府県を選択してください</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    @php
      $selectedPosition = !empty($user->position) ?  $user->position : old('position');
    @endphp
    <label for="position" class="col-md-5 col-form-label text-md-left">ポジション<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <label for="PG"><input id="PG" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="PG"  @if ($selectedPosition == 'PG') checked @endif>PG</label>
        <label for="SG"><input id="SG" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="SG" @if ($selectedPosition == 'SG') checked @endif>SG</label>
        <label for="SF"><input id="SF" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="SF" @if ($selectedPosition == 'SF') checked @endif>SF</label>
        <label for="PF"><input id="PF" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="PF" @if ($selectedPosition == 'PF') checked @endif>PF</label>
        <label for="C"><input id="C" type="radio" class="form-check-inline @error('position') is-invalid @enderror samazon-login-input" name="position" value="C" @if ($selectedPosition == 'C') checked @endif>C</label>
        
        @error('position')
        @foreach ($errors->get('position') as $error)
       <p><span role="alert" class="text-danger small">
            <strong>{{ $error }}</strong>
        </span></p>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    @php
      $selectedCarrer = !empty($user->carrer) ?  $user->carrer : old('carrer');
      $selectedCarrer = explode(',',$selectedCarrer);
      $carrers = ['未経験','中学まで','高校まで','大学まで','クラブチーム','実業団'];
    @endphp
    <label for="carrer" class="col-md-5 col-form-label text-md-left">バスケ経験<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
      @foreach($carrers as $carrer)
        <label for="inexperienced"><input id="inexperienced" type="checkbox" class="form-check-inline @error('carrer') is-invalid @enderror samazon-login-input" name="carrer[]" value="{{$carrer}}" @if (in_array($carrer,$selectedCarrer)) checked @endif>{{$carrer}}</label>
      @endforeach

        @error('carrer')
        @foreach ($errors->get('carrer') as $error)
        <p><span role="alert" class="text-danger small">
           <strong>バスケ経験を1つ以上選択してください</strong>
        </span></p>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="acievement" class="col-md-5 col-form-label text-md-left">実績<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <textarea id="acievement" rows='4' class="form-control @error('acievement') is-invalid @enderror samazon-login-input" name="acievement"  placeholder="インターハイ出場etc..">{{ !empty($user->acievement) ?  $user->acievement : old('acievement') }}</textarea>

        @error('acievement')
        @foreach ($errors->get('acievement') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="appeal" class="col-md-5 col-form-label text-md-left">アピール<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <textarea id="appeal" rows='4' class="form-control @error('appeal') is-invalid @enderror samazon-login-input" name="appeal">{{ !empty($user->appeal) ?  $user->appeal : old('appeal') }}</textarea>

        @error('appeal')
        @foreach ($errors->get('appeal') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="image" class="col-md-5 col-form-label text-md-left">プロフィール写真<span class="ml-1 samazon-nullable-input-label"><span class="samazon-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror samazon-login-input" name="image" value="{{ !empty($user->image) ?  $user->image : old('image')}}">
        @error('image')
        @foreach ($errors->get('image') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span class="ml-1 samazon-require-input-label"><span class="samazon-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror samazon-login-input" name="email" value="{{ !empty($user->email) ? $user->email : old('email') }}"  required autocomplete="email" placeholder="basketball.gmail.com">

        @error('email')
        @foreach ($errors->get('email') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>