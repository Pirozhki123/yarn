@extends('layouts.app')

@section('title', '報告詳細')

@section('content')
<div class="row block-center">
    <div class="col-md-2"></div>
    <div class="col-md-8 mt-5 p-3 center-block bg-light rounded overflow-x-auto">
        <h1 class="h1 m-2 text-center">報告詳細</h1>
            <table class="table table-striped table-hover text-center mx-auto">
                <thead>
                    <tr>
                        <th class="text-nowrap">報告者</th>
                        <th class="text-nowrap">報告種</th>
                        <th class="text-nowrap">機械番号</th>
                        <th class="text-nowrap">品番</th>
                        <th class="text-nowrap">サイズ</th>
                        <th class="text-nowrap">識別記号</th>
                        <th class="text-nowrap">報告内容</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap">{{$report->user->name}}</td>
                        <td class="text-nowrap">{{config('constants.report_types.' . $report->report_type)}}</td>
                        <td class="text-nowrap">{{$report->machine->lane_number . ' - ' . $report->machine->machine_number}}</td>
                        <td class="text-nowrap">{{$report->product->product_number}}</td>
                        <td class="text-nowrap">{{$report->size->size}}</td>
                        <td class="text-nowrap">{{$report->symbol->symbol}}</td>
                        <td class="text-nowrap">{{$report->report}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
