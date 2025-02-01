@extends('layouts.app')

@section('title', '備品詳細')

@section('content')
    <div class="row block-center">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 center-block bg-light ">
            <h1 class="m-2 text-center">備品詳細</h1>
            <div class="button-group mt-2 mb-2 d-flex justify-content-end">
                <form action="{{route('equipment.edit', $equipment->id)}}" method="GET" class="get_form">
                    @csrf
                    <button class="btn btn-sm btn-primary" type="submit">編集</button>
                </form>
                <form action="{{route('equipment.destroy', $equipment->id)}}" method="POST" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2" type="submit">削除</button>
                </form>
            </div>
            <table class="table table-striped table-hover text-center mx-auto">
                <tr>
                    <th>備品名</th>
                    <th>数量</th>
                </tr>
                <tr>
                    <td>{{$equipment->equipment_name}}</td>
                    <td>{{$equipment->quantity}}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
