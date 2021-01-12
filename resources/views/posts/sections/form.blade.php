@csrf

<div class="form-group row">
    <label for="title" class="col-md-5 col-form-label text-md-left">タイトル<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <input id="title" type="text" class="form-control @error('name') is-invalid @enderror basketball_app-login-input" name="title" value="{{ old('title', !empty($posts->title) ?  $posts->title : '') }}" required autocomplete="title" autofocus placeholder="タイトル">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="category" class="col-md-5 col-form-label text-md-left">カテゴリ<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
      @php
        $selectedCategory = old('category', !empty($posts->category) ?  $posts->category : '');      
      @endphp
        <select id="category" class="form-control @error('category') is-invalid @enderror basketball_app-login-input" name="category">
            <option value="" style="display: none;">選択してください</option>
            <option value="戦術" @if ($selectedCategory == '戦術') selected @endif >戦術</option>
            <option value="技術" @if ($selectedCategory == '技術') selected @endif>技術</option>
            <option value="練習方法" @if ($selectedCategory == '練習方法') selected @endif>練習方法</option>
            <option value="メンタル" @if ($selectedCategory == 'メンタル') selected @endif>メンタル</option>
            <option value="バスケ雑学" @if ($selectedCategory == 'バスケ雑学') selected @endif>バスケ雑学</option>
            <option value="その他" @if ($selectedCategory == 'その他') selected @endif>その他</option>
            </select>
        @error('category')
        <span class="invalid-feedback" role="alert">
            <strong>選択して下さい</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="body" class="col-md-5 col-form-label text-md-left">本文<span class="ml-1 basketball_app-require-input-label"><span class="basketball_app-require-input-label-text">必須</span></span></label>

    <div class="col-md-7">
        <textarea id="body" type="text" class="form-control @error('body') is-invalid @enderror basketball_app-login-input" name="body"  required autocomplete="body" autofocus placeholder="入力してください">{{ old('body', !empty($posts->body) ?  $posts->body : '') }}</textarea>

        @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>入力してください</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="url" class="col-md-5 col-form-label text-md-left">参考動画<span class="ml-1 basketball_app-nullable-input-label"><span class="basketball_app-nullable-input-label-text">任意</span></span></label>

    <div class="col-md-7">
        <textarea id="url" rows='4' class="form-control @error('url') is-invalid @enderror basketball_app-login-input" name="url"  placeholder="インターハイ出場etc..">{{old('url', !empty($posts->url) ?  $posts->url : '')}}</textarea>

        @error('url')
        @foreach ($errors->get('url') as $error)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $error }}</strong>
        </span>
        @endforeach
        @enderror
    </div>
</div>

<input type="hidden" name="user_id" value="{{$user->id}}">
