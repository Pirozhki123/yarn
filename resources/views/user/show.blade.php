@extends('layouts.app')

@section('title', 'ユーザー詳細')

@section('content')
    <form action="{{route('user.edit', $user->id)}}" method="GET" class="get_form">
        @csrf
        <button type="submit">編集</button>
    </form>
    <form action="{{route('user.destroy', $user->id)}}" method="POST" class="delete_form">
        @csrf
        @method('DELETE')
        <button type="submit">削除</button>
    </form>
    <table>
        <tr>
            <th>名前</th>
            <th>Eメールアドレス</th>
            <th>社員番号</th>
        </tr>
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->number}}</td>
        </tr>
    </table>
@endsection
