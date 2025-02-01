@extends('layouts.app')

@section('title', '機械一覧')

@section('content')
<div class="row center-block">
    <div class="col-md-2"></div>
    <div class="col-md-8 mt-5 center-block bg-light">
        <h1 class="m-2 text-center">機械一覧</h1>
        <div class="button-group mt-2 mb-2 d-flex justify-content-end">
            <a class="btn btn-sm btn-primary" href="/machine/create">新規</a>
        </div>
        @if(!empty($machines->all()))
            <table class="table table-striped table-hover text-center mx-auto">
                <tr>
                    <th>機械名</th>
                    <th>メーカー</th>
                    <th>針数</th>
                    <th>針種</th>
                    <th>機械番号</th>
                    <th>稼働状況</th>
                    <th>品番</th>
                    <th>サイズ</th>
                    <th>識別記号</th>
                    <th>詳細</th>
                </tr>
                @foreach($machines as $machine)
                <tr>
                    <td>{{$machine->machine_name}}</td>
                    <td>{{$machine->manufacture}}</td>
                    <td>{{$machine->needle_count}}</td>
                    <td>{{$machine->needle_type}}</td>
                    <td>{{$machine->lane_number . ' - ' . $machine->machine_number}}</td>
                    <td>{{config('constants.machine_status.' . $machine->machine_status)}}</td>
                    <td>{{$machine->product->product_number}}</td>
                    <td>{{$machine->size->size}}</td>
                    <td>{{$machine->symbol->symbol}}</td>
                    <td>
                        <a class="btn btn-sm btn-secondary" href="/machine/show/{{$machine->id}}">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>
        @endif
    </div>
    <div class="col-md-2"></div>
</div>
@endsection
