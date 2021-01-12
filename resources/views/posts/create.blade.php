@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mt-3 mb-3">新規投稿</h3>
            <hr>

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @include('posts.sections.form')

                 <div class="form-group">
                    <button type="submit" class="btn basketball_app-submit-button w-100">
                    チーム作成
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection