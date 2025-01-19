@extends('layouts.app')

@section('title', '備品詳細')

@section('content')
    <form action="{{route('equipment.edit', $equipment->id)}}" method="GET" class="get_form">
        @csrf
        <button type="submit">編集</button>
    </form>
    <form action="{{route('equipment.destroy', $equipment->id)}}" method="POST" class="delete_form">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
    <table>
        <tr>
            <th>備品名</th>
            <th>数量</th>
        </tr>
        <tr>
            <td>{{$equipment->equipment_name}}</td>
            <td>{{$equipment->quantity}}</td>
        </tr>
    </table>
@endsection
