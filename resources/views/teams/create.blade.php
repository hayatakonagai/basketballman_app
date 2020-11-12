@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mt-3 mb-3">新規チーム登録</h3>
            <hr>

            <form method="POST" action="{{ route('teams.store') }}" enctype="multipart/form-data">
            <input type="hidden" name="status" value="募集中">
            @include('teams.sections.form')

                 <div class="form-group">
                    <button type="submit" class="btn samazon-submit-button w-100">
                    チーム作成
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
               