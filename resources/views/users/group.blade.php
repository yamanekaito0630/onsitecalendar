@extends('users.layouts.group_search_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <h2 class="mb-4">どのグループに参加しますか？</h2>
        <div class="mb-3 d-flex">
            <a href="{{ route('create') }}" class="btn btn-success">作成</a>
            <a href="{{ route('join') }}" class="btn btn-success mx-3">参加</a>
        </div>
        <div class="search-result">
            <div class="search-result__hit-num"></div>
            <div id="search-result__list"></div>
        </div>
        <ul class="list-group target-area">
            @foreach($groups as $id => $name)
                <li class="list-group-item"><a href="{{ route('group.my-page', $id) }}">{{ $name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
