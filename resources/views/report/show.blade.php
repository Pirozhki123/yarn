@extends('layouts.app')

@section('title', '報告詳細')

@section('content')
<div class="row block-center">
    <div class="col-md-2"></div>
    <div class="col-md-8 mt-5 center-block bg-light ">
        <h1 class="m-2 text-center">ユーザー情報</h1>
        <div class="button-group mt-2 mb-2 d-flex justify-content-end">
            <form action="{{route('report.edit', $report->id)}}" method="GET" class="get_form">
                @csrf
                <button class="btn btn-sm btn-primary" type="submit">編集</button>
            </form>
            <form action="{{route('report.destroy', $report->id)}}" method="POST" class="delete_form">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger ml-2" type="submit">削除</button>
            </form>
        </div>
            <table class="table table-striped table-hover text-center mx-auto">
                <thead>
                    <tr>
                        <th>報告者</th>
                        <th>報告種</th>
                        <th>機械番号</th>
                        <th>品番</th>
                        <th>サイズ</th>
                        <th>識別記号</th>
                        <th>報告内容</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$report->user->name}}</td>
                        <td>{{config('constants.report_types.' . $report->report_type)}}</td>
                        <td>{{$report->machine->lane_number . ' - ' . $report->machine->machine_number}}</td>
                        <td>{{$report->product->product_number}}</td>
                        <td>{{$report->size->size}}</td>
                        <td>{{$report->symbol->symbol}}</td>
                        <td>{{$report->report}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
