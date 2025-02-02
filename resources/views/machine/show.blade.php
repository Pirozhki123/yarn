@extends('layouts.app')

@section('title', '機械詳細')

@section('content')
<div class="row block-center">
    <div class="col-md-2"></div>
    <div class="col-md-8 mt-5 center-block bg-light ">
        <h1 class="h1 m-2 text-center">機械詳細</h1>
        <div class="button-group mt-2 mb-2 d-flex justify-content-end">
            <form action="{{route('machine.edit', $machine->id)}}" method="GET" class="get_form">
                @csrf
                <button class="btn btn-sm btn-primary" type="submit">編集</button>
            </form>
            <form action="{{route('machine.destroy', $machine->id)}}" method="POST" class="delete_form">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger ml-2" type="submit">削除</button>
            </form>
        </div>
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
        </tr>
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
        </tr>
    </table>
@endsection
