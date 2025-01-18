@include('head')
@include('components.header')
@include('parts.messages')
<h1>備品一覧</h1>
<a href="/equipment/create">新規追加</a>
@if(!empty($equipments->all()))
    <table>
        <tr>
            <th>備品名</th>
            <th>数量</th>
            <th>詳細</th>
        </tr>
        @foreach($equipments as $equipment)
        <tr>
            <td>{{$equipment->equipment_name}}</td>
            <td>{{$equipment->quantity}}</td>
            <td>
                <a href="/equipment/show/{{$equipment->id}}">詳細</a>
            </td>
        </tr>
        @endforeach
    </table>
@endif
