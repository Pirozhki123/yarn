<label for="machine_name">機械名</label>
<input type="text" id="machine_name" name="machine_name" value="{{$viewItem['machine_name'] ?? null}}">
<br>
<label for="manufacture">メーカー</label>
<input type="text" id="manufacture" name="manufacture" value="{{$viewItem['manufacture'] ?? null}}">
<br>
<label for="needle_count">針数</label>
<input type="number" id="needle_count" name="needle_count" value="{{$viewItem['needle_count'] ?? null}}">
<br>
<label for="needle_type">針種</label>
<input type="text" id="needle_type" name="needle_type" value="{{$viewItem['needle_type'] ?? null}}">
<br>
<label>機械番号</label>
<input type="number" id="lane_number" name="lane_number" value="{{$viewItem['lane_number'] ?? null}}">-
<input type="number" id="machine_number" name="machine_number" value="{{$viewItem['machine_number'] ?? null}}">
<br>
@foreach($viewItemRelations as $viewItemRelation)
    <label for="name">{{$viewItemRelation['name']}}</label>
    <select name="{{$viewItemRelation['key'] . '_id'}}">
        @foreach($viewItemRelation['values'] as $value)
            <option value={{$value['id']}} {{$value['id'] == $viewItem[$viewItemRelation['key'] . '_id'] ? 'selected' : '';}}>
                {{$value[$viewItemRelation['column']]}}
            </option>
        @endforeach
    </select>
    <br>
@endforeach
<button type="submit" value="登録">登録</button>
