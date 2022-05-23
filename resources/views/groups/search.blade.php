@extends('groups.layouts.app')

@section('content')
    <h3 class="text-center mt-2">検索結果：{{ $onsite_name }}</h3>
    <input type="hidden" id="onsite-id" value="{{ $onsite_id }}">
    <input type="hidden" id="id" value="{{ $group->id }}">
    <div class="w-100 mx-auto pt-2 calendar">
        <div id='calendar'></div>
    </div>

    <!-- 給与モーダル -->
    <div class="modal fade" id="salaryModal" tabindex="-1" aria-labelledby="salaryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="salaryModalLabel">あなたの予定給与（{{ $month }}月）</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ !empty($monthly_salary) ? $monthly_salary : 0 }}円
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">閉じる</button>
                </div>
            </div>
        </div>
    </div>
@endsection
