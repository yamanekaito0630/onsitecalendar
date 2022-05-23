@extends('users.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">編集画面</h2>
        <form action="{{ route('update') }}" method="post">
            @csrf
            <input type="hidden" name="user-name" value="{{ true }}">
            <div class="mb-3">
                <label for="user-name" class="form-label">名前</label>
                <input type="text" name="name" class="form-control" id="user-name" value="{{ Auth::user()->name }}" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>

        <form action="{{ route('update') }}" method="post" class="mt-4">
            @csrf
            <input type="hidden" name="user-password" value="{{ true }}">
            <div class="mb-3">
                <label for="new-user-password" class="form-label">新しいログインパスワード</label>
                <input type="password" name="password" class="form-control" id="new-user-password" required>
            </div>
            <button type="submit" class="btn btn-primary">変更する</button>
        </form>

        <div class="mt-4">
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#userDeleteModal">アカウントを削除する</button>
        </div>
    </div>

    <!-- 削除モーダル -->
    <div class="modal fade" id="userDeleteModal" tabindex="-1" aria-labelledby="userDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDeleteModalLabel">本当に削除しますか？</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                    ※削除後はアカウントの復旧はできません。
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                    <form action="{{ route('delete') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">削除する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
