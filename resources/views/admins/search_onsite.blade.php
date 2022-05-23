@extends('admins.layouts.app')

@section('content')
    <h3 class="text-center mt-2">検索結果：{{ $onsite->name }}</h3>
    <input type="hidden" id="onsite-id" value="{{ $onsite->id }}">
    <input type="hidden" id="admin" value="true">
    <input type="hidden" id="id" value="{{ $group->id }}">
    <div class="w-100 mx-auto pt-2 calendar">
        <div id='calendar'></div>
    </div>
@endsection
