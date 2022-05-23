@extends('admins.layouts.app')

@section('content')
    <input type="hidden" id="admin" value="true">
    <input type="hidden" id="id" value="{{ $group->id }}">
    <div class="w-100 mx-auto pt-5 calendar">
        <div id='calendar'></div>
    </div>
@endsection
