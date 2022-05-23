@extends('admins.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">現場管理画面</h2>
        <form action="{{ route('admin.store.onsite', $group->id) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="onsite-name" class="form-label">新しい現場を追加</label>
                <input type="text" name="onsite-name" class="form-control" id="onsite-name" autofocus required>
            </div>
            <button type="submit" class="btn btn-primary">追加する</button>
        </form>

        <div class="mt-4">
            <p class="form-label">登録されている現場</p>
            <!-- 登録された現場 -->
            @foreach($onsites as $id => $name)
                <form class="row mb-3">
                    <div class="col onsite-name">
                        <p>{{ $name }}</p>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#onsiteModal{{ $id }}">削除</button>
                    </div>
                </form>

                <!-- 現場削除モーダル -->
                <div class="modal fade" id="onsiteModal{{ $id }}" tabindex="-1" aria-labelledby="onsiteModal{{ $id }}Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="onsiteModal{{ $id }}Label">本当に削除しますか？</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-danger">
                                ※現場名：{{ $name }}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                                <form action="{{ route('admin.delete.onsite', $group->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="onsite-id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger">削除する</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
