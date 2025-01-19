@extends('layouts.app')

@section('title', '報告詳細')

@section('content')
    <form action="{{route('report.edit', $report->id)}}" method="GET" class="get_form">
        @csrf
        <button type="submit">編集</button>
    </form>
    <form action="{{route('report.destroy', $report->id)}}" method="POST" class="delete_form">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
    <table>
        <tr>
            <th>報告者</th>
            <th>報告種</th>
            <th>機械番号</th>
            <th>品番</th>
            <th>サイズ</th>
            <th>識別記号</th>
            <th>報告内容</th>
        </tr>
        <tr>
            <td>{{$report->user->name}}</td>
            <td>{{config('constants.report_types.' . $report->report_type)}}</td>
            <td>{{$report->machine->lane_number . ' - ' . $report->machine->machine_number}}</td>
            <td>{{$report->product->product_number}}</td>
            <td>{{$report->size->size}}</td>
            <td>{{$report->symbol->symbol}}</td>
            <td>{{$report->report}}</td>
        </tr>
    </table>
@endsection
