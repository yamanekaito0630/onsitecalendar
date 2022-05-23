@extends('groups.layouts.create_join_group_app')

@section('content')
    <!-- 日付モーダル -->
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4>{{ $res['month'] }}月{{ $res['date'] }}日{{ $res['week'] }}</h4>
        </div>
        <div class="mb-2">
            <label class="form-label m-0">出勤場所</label>
            <div class="container-fluid">
                <div class="row">
                @foreach($registered_sites as $registered_site)
                    <button class="btn btn-primary d-flex align-items-center justify-content-between p-1 col-md-3 m-1" data-bs-toggle="modal" data-bs-target="#onsiteDetailModal{{$registered_site['onsite_id']}}" style="width: 150px;">
                        <p class="my-auto">{{ $registered_site['name'] }}</p>
                        @if($registered_site['oneday_flag'] == false)
                            <span class="text-sm">半</span>
                        @endif
                    </button>

                    <!-- 現場詳細モーダル -->
                    <div class="modal fade" id="onsiteDetailModal{{$registered_site['onsite_id']}}" tabindex="-1" aria-labelledby="onsiteDetailModal{{$registered_site['onsite_id']}}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="onsiteDetailModal{{$registered_site['onsite_id']}}Label">現場詳細</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6>{{ $registered_site['name'] }}</h6>
                                    <form action="{{ route('group.update', $group->id) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="onsite-id" value="{{ $registered_site['onsite_id'] }}">
                                        <input type="hidden" name="date" value="{{ $res['date-str'] }}">
                                        <label class="form-label">勤務時間</label>
                                        @if($count >= 2)
                                            <span class="text-danger">※1日以上の更新はできません。</span>
                                        @endif
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag" value="one-day" checked>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                一日
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag" value="half-day">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                半日
                                            </label>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-primary mt-3" {{ $count >= 2 ? 'disabled' : '' }}>更新</button>
                                        </div>
                                    </form>
                                    <form action="{{ route('group.delete', $group->id) }}" method="post" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="member-id" value="{{ $registered_site['user_id'] }}">
                                        <input type="hidden" name="onsite-id" value="{{ $registered_site['onsite_id'] }}">
                                        <input type="hidden" name="date" value="{{ $res['date-str'] }}">
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <form action="{{ route('group.add_onsite', $group->id) }}" method="post" class="mb-2">
            @csrf
            <input type="hidden" name="date" value="{{ $res['date-str'] }}">
            <label for="" class="form-label">出勤場所を追加</label>
            @if($count >= 2)
                <p class="text-danger">※2つ以上は登録できません。</p>
            @endif
            <div class="d-flex">
                <select name="onsite-id" class="form-control w-50">
                    @foreach($onsites as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary mx-2" {{ $count >= 2 ? 'disabled' : '' }}>追加</button>
            </div>
        </form>

        <form action="{{ route('memo.store') }}" method="post">
            @csrf
            <input type="hidden" name="group-id" value="{{ $group->id }}">
            <input type="hidden" name="date" value="{{ $res['date-str'] }}">
            <label for="" class="form-label">メモ</label>
            <textarea class="form-control mb-2" name="memo">{{ !empty($memo) ? $memo->memo : '' }}</textarea>
            <button type="submit" class="btn btn-primary">保存</button>
        </form>
    </div>
@endsection
