@extends('layouts.app')

@section('title', '報告一覧')

@section('content')
    <div class="row center-block">
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-5 center-block bg-light overflow-x-auto rounded">
            <h1 class="h1 m-2 text-center">報告一覧</h1>
            <div class="button-group mt-2 mb-2 d-flex justify-content-end">
                @foreach(config('constants.report_types') as $key => $report_type)
                    <a class="btn btn-sm btn-primary ml-2" href="/report/create/{{$key}}">{{$report_type}}</a>
                @endforeach
            </div>
            @if(!empty($reports->all()))
                <table class="table table-striped table-hover text-center mx-auto">
                    <tr>
                        <th class="text-nowrap">報告者</th>
                        <th class="text-nowrap">報告種</th>
                        <th class="text-nowrap">機械番号</th>
                        <th class="text-nowrap">品番</th>
                        <th class="text-nowrap">サイズ</th>
                        <th class="text-nowrap">識別記号</th>
                        <th class="text-nowrap">報告内容</th>
                        <th class="text-nowrap">報告日時</th>
                        <th class="text-nowrap">詳細</th>
                    </tr>
                    @foreach($reports as $report)
                    <tr>
                        <td class="text-nowrap">{{$report->user->name}}</td>
                        <td class="text-nowrap">{{config('constants.report_types.' . $report->report_type)}}</td>
                        <td class="text-nowrap">{{$report->machine->lane_number . ' - ' . $report->machine->machine_number}}</td>
                        <td class="text-nowrap">{{$report->product->product_number}}</td>
                        <td class="text-nowrap">{{$report->size->size}}</td>
                        <td class="text-nowrap">{{$report->symbol->symbol}}</td>
                        <td class="text-nowrap" style="overflow: hidden; text-overflow: ellipsis; max-width: 200px;">{{$report->report}}</td>
                        <td class="text-nowrap">{{$report->created_at}}</td>
                        <td class="text-nowrap">
                            <a class="btn btn-sm btn-secondary" href="/report/show/{{$report->id}}">詳細</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            @endif
        </div>
        <div class="col-md-1"></div>
    </div>
@endsection
