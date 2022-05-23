@extends('admins.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">日当履歴（{{ $member->name }}）</h2>
        <ul class="list-group w-75">
            @foreach($daily_allowances as $daily_allowance)
                <li class="list-group-item d-flex justify-content-between">
                    <p class="my-auto">{{ $daily_allowance['salary'] }}円</p>
                    <p class="my-auto">{{ str_replace('-', '/', $daily_allowance['start_date']) }}~</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
