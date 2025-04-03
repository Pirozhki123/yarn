@extends('layouts.app')

@section('title', 'ユーザー一覧')

@section('content')
    <div class="row center-block">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 center-block bg-light rounded">
            <h1 class="h1 m-2 text-center">ユーザー一覧</h1>
            <div class="button-group mt-2 mb-2 d-flex justify-content-end">
                <a class="btn btn-sm btn-primary" href="user/create">新規</a>
            </div>
            @if(!empty($users->all()))
                <table class="table table-striped table-hover text-center mx-auto">
                    <thead>
                        <tr>
                            <th>名前</th>
                            <th>Eメールアドレス</th>
                            <th>社員番号</th>
                            <th>管理権限</th>
                            <th>詳細</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->number}}</td>
                                <td>{{$user->admin ? '有' : '無'}}</td>
                                <td>
                                    <a class="btn btn-sm btn-secondary" href="user/show/{{$user->id}}">詳細</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
