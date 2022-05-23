@extends('users.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4>{{ $res['month'] }}月{{ $res['date'] }}日{{ $res['week'] }}</h4>
        </div>

        <form action="{{ route('memo.store') }}" method="post">
            @csrf
            <input type="hidden" name="date" value="{{ $res['date-str'] }}">
            <label for="" class="form-label">メモ</label>
                <textarea class="form-control mb-2" name="memo">{{ !empty($memo) ? $memo->memo : '' }}</textarea>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
@endsection
