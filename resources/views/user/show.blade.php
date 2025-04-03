@extends('layouts.app')

@section('title', 'ユーザー詳細')

@section('content')
    <div class="row block-center">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 center-block bg-light rounded">
            <h1 class="h1 m-2 text-center">ユーザー詳細</h1>
            <div class="button-group mt-2 mb-2 d-flex justify-content-end">
                <form action="{{route('user.edit', $user->id)}}" method="GET" class="get_form">
                    @csrf
                    <button class="btn btn-sm btn-primary" type="submit">編集</button>
                </form>
                <form action="{{route('user.destroy', $user->id)}}" method="POST" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2" type="submit">削除</button>
                </form>
            </div>
            <table class="table table-striped table-hover text-center mx-auto">
                <thead>
                    <tr>
                        <th>名前</th>
                        <th>Eメールアドレス</th>
                        <th>社員番号</th>
                        <th>管理権限</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->number}}</td>
                        <td>{{$user->admin ? '有' : '無'}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
