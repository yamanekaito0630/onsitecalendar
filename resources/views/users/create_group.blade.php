@extends('users.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">グループ作成画面</h2>

        @if( !empty($error_message) )
            <!-- エラーメッセージの表示 -->
            <p class="error-message text-danger">{{ $error_message }}</p>
        @endif

        <form action="{{ route('store') }}" method="post">
            @csrf
            <input type="hidden" name="create" value="{{ true }}">
            <div class="mb-3">
                <label for="group-name" class="form-label">グループ名<span class="required">必須</span></label>
                <input type="text" name="group_name" value="{{ !empty($group_name) ? $group_name : '' }}" class="form-control" id="group-name" autofocus required>
            </div>
            <div class="mb-3">
                <label for="watchword" class="form-label">参加時の合言葉<span class="required">必須</span></label>
                <input type="text" name="watchword" class="form-control" id="watchword" required>
            </div>
            <button type="submit" class="btn btn-primary">作成する</button>
        </form>
    </div>
@endsection
