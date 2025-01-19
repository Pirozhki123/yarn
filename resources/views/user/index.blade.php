@include('head')
@include('components.header')
@include('parts.messages')
<h1>ユーザー一覧</h1>
<a href="user/create">新規追加</a>
@if(!empty($users->all()))
    <table>
        <tr>
            <th>名前</th>
            <th>Eメールアドレス</th>
            <th>社員番号</th>
            <th>詳細</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->number}}</td>
            <td>
                <a href="user/show/{{$user->id}}">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
@endif
