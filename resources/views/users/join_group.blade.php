@extends('users.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">グループ参加画面</h2>

        @if(!empty($group))
            <form action="{{ route('store') }}" method="post" class="mb-3">
                @csrf
                <input type="hidden" name="join" value="{{ true }}">
                <input type="hidden" name="group-id" value="{{ $group->id }}">
                <button type="submit">{{ $group->name }}</button>
            </form>
        @endif

        @if(!empty($error_message))
            <p class="text-danger">{{ $error_message }}</p>
        @endif

        <form action="{{ route('show') }}" method="get">
            <div class="mb-3">
                <label for="watchword" class="form-label">合言葉</label>
                <input type="text" name="watchword" value="{{ !empty($watchword) ? $watchword : ''}}" class="form-control" id="watchword" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary">検索する</button>
        </form>
    </div>
@endsection
