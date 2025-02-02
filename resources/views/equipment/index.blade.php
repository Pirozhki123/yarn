@extends('layouts.app')

@section('title', '備品一覧')

@section('content')
    <div class="row center-block">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 center-block bg-light">
        <h1 class="h1 m-2 text-center">備品一覧</h1>
        <div class="button-group mt-2 mb-2 d-flex justify-content-end">
            <a class="btn btn-sm btn-primary" href="/equipment/create">新規</a>
        </div>
        @if(!empty($equipments->all()))
            <table class="table table-striped table-hover text-center mx-auto">
                <thead>
                    <tr>
                        <th>備品名</th>
                        <th>数量</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipments as $equipment)
                    <tr>
                        <td>{{$equipment->equipment_name}}</td>
                        <td>{{$equipment->quantity}}</td>
                        <td>
                            <a class="btn btn-sm btn-secondary" href="/equipment/show/{{$equipment->id}}">詳細</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="col-md-2"></div>
    </div>
@endsection
