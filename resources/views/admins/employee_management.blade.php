@extends('admins.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="mb-4">作業員管理画面</h2>
        </div>
        <ul class="list-group">
            @foreach($members as $member)
                <li class="list-group-item">
                    <p class="employee-name {{ $member['is_admin'] ? 'text-success' : '' }}">{{ $member['name'] }}{{ $member['is_admin'] ? '(管理者)' : '' }}</p>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 my-1">
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#dailyAllowanceModal{{ $member['user_id'] }}">日当設定
                                </button>
                            </div>
                            <div class="col-lg-3 my-1">
                                <a href="{{ route('admin.members.detail', [$group->id, $member->id]) }}" class="btn btn-success w-100" >日当履歴</a>
                            </div>
                            <div class="col-lg-3 my-1">
                                <button type="submit" class="btn btn-warning w-100" data-bs-toggle="modal"
                                        data-bs-target="#isAdminModal{{ $member['user_id'] }}" {{ $member['is_admin'] ? 'disabled' : '' }}>
                                    管理権限
                                </button>
                            </div>
                            <div class="col-lg-3 my-1">
                                <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                                        data-bs-target="#employeeDeleteModal{{ $member['user_id'] }}" {{ $member['is_admin'] ? 'disabled' : '' }}>
                                    退会
                                </button>
                            </div>


                        </div>
                    </div>

                    <!-- 日当設定モーダル -->
                    <div class="modal fade" id="dailyAllowanceModal{{ $member['user_id'] }}" tabindex="-1"
                         aria-labelledby="dailyAllowanceModal{{ $member['user_id'] }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                        id="dailyAllowanceModal{{ $member['user_id'] }}Label">{{ $member['name'] }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <form action="{{ route('admin.store.salary', $group->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user-id" value="{{ $member['user_id'] }}">
                                    <div class="modal-body d-flex align-items-center">
                                        <label for="" class="form-label">日当：</label>
                                        <input type="number" name="salary" class="mx-2 form-control w-50" required>
                                        <span>円</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる
                                        </button>
                                        <button type="submit" class="btn btn-primary">保存</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- 権限付与モーダル -->
                    <div class="modal fade" id="isAdminModal{{ $member['user_id'] }}" tabindex="-1"
                         aria-labelledby="isAdminModal{{  $member['user_id'] }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="isAdminModal{{  $member['user_id'] }}Label">
                                        権限を付与しますか？</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-danger">
                                    ※作業員名：{{ $member['name'] }}<br>
                                    ※あなたの管理者権限はなくなります。
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                                    <form action="{{ route('admin.update.mode', $group->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="member-id" value="{{ $member['user_id'] }}">
                                        <button type="submit" class="btn btn-warning">権限付与</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 退会モーダル -->
                    <div class="modal fade" id="employeeDeleteModal{{  $member['user_id'] }}" tabindex="-1"
                         aria-labelledby="employeeDeleteModal{{  $member['user_id'] }}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="employeeDeleteModal{{  $member['user_id'] }}Label">
                                        本当に退会させますか？</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-danger">
                                    ※作業員名：{{ $member['name'] }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">しない</button>
                                    <form action="{{ route('admin.delete.member', $group->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="member-id" value="{{ $member['user_id'] }}">
                                        <button type="submit" class="btn btn-danger">退会させる</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
