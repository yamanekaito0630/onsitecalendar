@extends('groups.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto pt-4  bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded text-center">
        <h3>管理者ログイン画面</h3>
        @if(!$is_admin)
            <p class="text-danger">※管理者権限がありません。</p>
        @endif
        <a href="{{ route('admin.my-page', $group->id) }}" class="my-2 btn btn-primary {{ $is_admin ? '' : 'disabled' }}">{{ $group->name }}の管理者としてログイン</a>
    </div>
@endsection
