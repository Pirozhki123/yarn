@extends('layouts.app')

@section('title', '機械一覧')

@section('content')
    <a href="/machine/create">新規追加</a>
    @if(!empty($machines->all()))
        <table>
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
                    <a href="/machine/show/{{$machine->id}}">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection
