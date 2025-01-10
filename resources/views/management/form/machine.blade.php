<label for="machine_name">機械名</label>
<input type="text" id="machine_name" name="machine_name" value="{{old('machine_name', $viewItem['machine_name'] ?? null)}}">
<br>
<label for="manufacture">メーカー</label>
<input type="text" id="manufacture" name="manufacture" value="{{old('manufacture', $viewItem['manufacture'] ?? null)}}">
<br>
<label for="needle_count">針数</label>
<input type="number" id="needle_count" name="needle_count" value="{{old('needle_count', $viewItem['needle_count'] ?? null)}}">
<br>
<label for="needle_type">針種</label>
<input type="text" id="needle_type" name="needle_type" value="{{old('needle_type', $viewItem['needle_type'] ?? null)}}">
<br>
<label>機械番号</label>
<input type="number" id="lane_number" name="lane_number" value="{{old('lane_number', $viewItem['lane_number'] ?? null)}}">-
<input type="number" id="machine_number" name="machine_number" value="{{old('machine_number', $viewItem['machine_number'] ?? null)}}">
<br>
@foreach($viewItemRelations as $viewItemRelation)
    <label for="{{$viewItemRelation['key'] . '_id'}}">{{$viewItemRelation['name']}}</label>
    <select name="{{$viewItemRelation['key'] . '_id'}}">
        @foreach($viewItemRelation['values'] as $value)
            <option value={{$value['id']}} {{old('{{$viewItemRelation['key'] . '_id'}}', $value['id']) == $viewItem[$viewItemRelation['key'] . '_id'] ? 'selected' : '';}}>
                {{$value[$viewItemRelation['column']]}}
            </option>
        @endforeach
    </select>
    <br>
@endforeach
<button type="submit" value="登録">登録</button>
