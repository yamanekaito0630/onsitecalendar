@extends('admins.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4>{{ $date }}</h4>
        </div>
        <h2>{{ $onsite[0]->name }}<br>（{{ $number }}人）</h2>
        <ul class="list-group">
            @foreach($members as $member)
                <li class="list-group-item">
                    {{ $member['name'] }}
                    @if($member['oneday_flag'] != true)
                        （半日）
                    @else
                        （一日）
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endsection
