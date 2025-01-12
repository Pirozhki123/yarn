@include('head')
<h1>{{$viewInfo['name']}}一覧</h1>
<a href="{{$viewInfo['route']}}/create">{{$viewInfo['name']}}追加</a>
<a href="/">ダッシュボード</a>
@if(isset($viewItems[0]))
    <table>
        <tr>
            @foreach($viewItems[0] as $column => $value)
            <th>{{$column}}</th>
            @endforeach
            <th>詳細</th>
            <th>削除</th>
        </tr>
        @foreach($viewItems as $viewItem)
        <tr>
            @foreach($viewItem as $value2)
            <td>{{$value2}}</td>
            @endforeach
            <td>
                <a href="{{$viewInfo['route']}}/show/{{$viewItem['id']}}">詳細</a>
            </td>
            <td>
                <form action="{{route($viewInfo['key'] . '.destroy', $viewItem['id'])}}" method="POST" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endif
