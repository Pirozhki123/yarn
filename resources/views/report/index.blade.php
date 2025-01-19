@extends('layouts.app')

@section('title', '報告一覧')

@section('content')
    <a href="/report/create">新規追加</a>
    @if(!empty($reports->all()))
        <table>
            <tr>
                <th>報告者</th>
                <th>報告種</th>
                <th>機械番号</th>
                <th>品番</th>
                <th>サイズ</th>
                <th>識別記号</th>
                <th>報告内容</th>
                <th>詳細</th>
            </tr>
            @foreach($reports as $report)
            <tr>
                <td>{{$report->user->name}}</td>
                <td>{{config('constants.report_types.' . $report->report_type)}}</td>
                <td>{{$report->machine->lane_number . ' - ' . $report->machine->machine_number}}</td>
                <td>{{$report->product->product_number}}</td>
                <td>{{$report->size->size}}</td>
                <td>{{$report->symbol->symbol}}</td>
                <td>{{$report->report}}</td>
                <td>
                    <a href="/report/show/{{$report->id}}">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection
