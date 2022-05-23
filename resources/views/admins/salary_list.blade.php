@extends('admins.layouts.create_join_group_app')

@section('content')
    <div class="box mx-auto p-5 bg-gray-100 mt-5 shadow-lg p-3 mb-5 bg-body rounded">
        <div class="d-flex align-items-center justify-content-between">
            <h4>メンバーの予定給与<br>（{{ $month }}月）</h4>
            <form>
                <input class="btn btn-secondary w-100 no-print" type="button" value="印刷" onclick="window.print();">
            </form>
        </div>
        <ul class="list-group">
            @foreach($monthly_salaries as $monthly_salary)
                <li class="list-group-item d-flex justify-content-between">
                    <p class="my-auto">{{ !is_null($monthly_salary) ? $monthly_salary[0]->name : '' }}</p>
                    <p class="my-auto">{{ !is_null($monthly_salary) ? $monthly_salary[1] : '' }}円</p>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
