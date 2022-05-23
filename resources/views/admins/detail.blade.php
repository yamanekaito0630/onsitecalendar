@extends('admins.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4>{{ $res['month'] }}月{{ $res['date'] }}日{{ $res['week'] }}</h4>
        </div>
        <div class="mb-2">
            <label class="form-label m-0">出勤場所</label>
            <div class="container-fluid">
                <div class="row">
                    @foreach($registered_sites as $registered_site)
                        <form action="{{ route('admin.member', $group->id) }}" method="post" class="col-md-3 m-1">
                            @csrf
                            <input type="hidden" name="date" value="{{ $res['date-str'] }}">
                            <input type="hidden" name="date-display" value="{{ $res['month'] }}月{{ $res['date'] }}日{{ $res['week'] }}">
                            <input type="hidden" name="onsite-id" value="{{ $registered_site['onsite_id'] }}">
                            <button type="submit" class="btn btn-success" style="width: 150px;">{{ $registered_site['name'] }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>

        <form action="{{ route('memo.store') }}" method="post">
            @csrf
            <input type="hidden" name="is-admin" value="{{ true }}">
            <input type="hidden" name="group-id" value="{{ $group->id }}">
            <input type="hidden" name="date" value="{{ $res['date-str'] }}">
            <label for="" class="form-label">メモ</label>
            <textarea class="form-control mb-2" name="memo">{{ !empty($memo) ? $memo->memo : '' }}</textarea>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
@endsection
