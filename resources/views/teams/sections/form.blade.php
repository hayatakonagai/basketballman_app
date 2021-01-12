@csrf

<div class="form-group row">
    <label for="name" class="col-md-5 col-form-label text-md-left">チーム名<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror basketball_app-login-input" name="name" value="{{ old('name', !empty($team->name) ?  $team->name : '') }}" required autocomplete="name" autofocus placeholder="アルバルク東京">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="level" class="col-md-5 col-form-label text-md-left">レベル<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
      @php
        $selectedLevel = old('level', !empty($team->level) ?  $team->level : '');      
      @endphp
        <select id="level" class="form-control @error('level') is-invalid @enderror basketball_app-login-input" name="level">
            <option value="" style="display: none;">選択してください</option>
            <option value="初級" @if ($selectedLevel == '初級') selected @endif >初級</option>
            <option value="中級" @if ($selectedLevel == '中級') selected @endif>中級</option>
            <option value="上級" @if ($selectedLevel == '上級') selected @endif>上級</option>
            </select>
        @error('level')
        <span class="invalid-feedback" role="alert">
            <strong>選択して下さい</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="goal" class="col-md-5 col-form-label text-md-left">チームの目標<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <textarea id="goal" type="text" class="form-control @error('goal') is-invalid @enderror basketball_app-login-input" name="goal"  required autocomplete="goal" autofocus placeholder="入力してください">{{ old('goal', !empty($team->goal) ?  $team->goal : '') }}</textarea>

        @error('goal')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="where" class="col-md-5 col-form-label text-md-left">活動場所１<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
      @php
        $selectedWhere = old('where', !empty($team->where) ?  $team->where : '');      ;
      @endphp
        <select id="where" class="form-control @error('where') is-invalid @enderror basketball_app-login-input" name="where">
            <option value="" style="display: none;">選択してください</option>
            @foreach(\App\Team::WHERE as $where)
             <option value="{{$where}}" @if ($selectedWhere == $where) selected @endif>{{$where}}</option>
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
    <label for="where_city" class="col-md-5 col-form-label text-md-left">活動場所２<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="where_city" type="text" class="form-control @error('where_city') is-invalid @enderror basketball_app-login-input" name="where_city" value="{{ old('where_city', !empty($team->where_city) ?  $team->where_city : '') }}"  placeholder="市区町村">
        
        @error('where_city')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="where_detail" class="col-md-5 col-form-label text-md-left">活動場所３<span class="ml-1 basketball_app-nullable-input-label"><span class="basketball_app-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <input id="where_detail" type="text" class="form-control @error('where_detail') is-invalid @enderror basketball_app-login-input" name="where_detail" value="{{ old('where_detail', !empty($team->where_detail) ?  $team->where_detail : '') }}"  placeholder="○○体育館">

        @error('where_detail')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="frequency" class="col-md-5 col-form-label text-md-left">活動頻度<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
      @php
        $selectedFrequency = old('frequency', !empty($team->frequency) ?  $team->frequency : '');      ;
      @endphp
        <select id="frequency" class="form-control @error('frequency') is-invalid @enderror basketball_app-login-input" name="frequency">
            <option value="" style="display: none;">選択してください</option>
            @foreach(\App\Team::FREQUENCY as $frequency)
             <option value="{{$frequency}}" @if ($selectedFrequency == $frequency) selected @endif>{{$frequency}}</option>
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
    <label for="people" class="col-md-5 col-form-label text-md-left">人数<span class="ml-1 basketball_app-nullable-input-label"><span class="basketball_app-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <input id="people" type="text" class="form-control" name="people" value="{{ old('people', !empty($team->people) ?  $team->people : '') }}">
    </div>
</div>

<div class="form-group row">
    <label for="wanted" class="col-md-5 col-form-label text-md-left">こんな人が欲しい<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <textarea id="wanted" rows='4' class="form-control @error('wanted') is-invalid @enderror basketball_app-login-input" name="wanted">{{ old('wanted', !empty($team->wanted) ?  $team->wanted : '') }}</textarea>

        @error('wanted')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>
   
<div class="form-group row">
    <label for="description" class="col-md-5 col-form-label text-md-left">チームの詳細<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <textarea id="description" rows='4' class="form-control @error('description') is-invalid @enderror basketball_app-login-input" name="description" >{{ old('description', !empty($team->description) ?  $team->description : '') }}</textarea>

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="image" class="col-md-5 col-form-label text-md-left">チーム写真<span class="ml-1 basketball_app-nullable-input-label"><span class="basketball_app-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror basketball_app-login-input" name="image" value="{{ !empty($team->image) ?  $team->image : old('image')}}">
        @error('image')
        @foreach ($errors->get('image') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<input type="hidden" name="user_id" value="{{$user->id}}">

