@if(isset($viewItemRelations))
    @foreach($viewItemRelations as $viewItemRelation)
        <h2>{{$viewItemRelation['name']}}</h2>
        @if($viewInfo['key'] == 'product')
            <form action="{{route($viewItemRelation['key'] . '.store', $viewItem['id'])}}" method="POST" class="form">
                @csrf
                @method('POST')
                <label for="name">{{$viewItemRelation['name']}}追加</label>
                <input type="text" name="{{$viewItemRelation['key']}}">
                <button type="submit" value="追加">追加</button>
            </form>
        @endif
        @if(isset($viewItemRelation['values'][0]))
            <table>
                <tr>
                    @foreach($viewItemRelation['values'][0] as $column => $value)
                        <th>{{$column}}</th>
                    @endforeach
                </tr>
                @foreach($viewItemRelation['values'] as $values)
                    <tr>
                        @foreach($values as $value)
                            <td>{{$value}}</td>
                        @endforeach
                        <td>
                            <form action="{{route($viewItemRelation['key'] . '.destroy', $values['id'])}}" method="POST" class="delete_form">
                                @csrf
                                @method('DELETE')
                                <button type="submit">削除</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endforeach
@endif
