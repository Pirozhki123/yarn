<label for="machine_name">機械名</label>
<input type="text" id="machine_name" name="machine_name" value="{{old('machine_name', $machine->machine_name ?? null)}}">
<br>
<label for="manufacture">メーカー</label>
<input type="text" id="manufacture" name="manufacture" value="{{old('manufacture', $machine->manufacture ?? null)}}">
<br>
<label for="needle_count">針数</label>
<input type="number" id="needle_count" name="needle_count" value="{{old('needle_count', $machine->needle_count ?? null)}}">
<br>
<label for="needle_type">針種</label>
<input type="text" id="needle_type" name="needle_type" value="{{old('needle_type', $machine->needle_type ?? null)}}">
<br>
<label>機械番号</label>
<select id="lane_number", name="lane_number">
    @for($i = 1; $i <= config('constants.max_lane'); $i++)
        <option value="{{$i}}" @selected(old('lane_number', $machine->lane_number ?? null) == $i)>
            {{$i}}
        </option>
    @endfor
</select>
-
<select id="machine_number", name="machine_number">
    @for($i = 1; $i <= config('constants.max_machine_number'); $i++)
        <option value="{{$i}}" @selected(old('machine_number', $machine->machine_number ?? null) == $i)>
            {{$i}}
        </option>
    @endfor
</select>
<br>
<label for="machine_status">稼働状況</label>
<select id ="machine_status" name="machine_status">
    <option value=""></option>
    @foreach($machine_statuses as $key => $machine_status)
        <option value="{{$key}}" @selected(old('machine_status', $machine->machine_status ?? null) == $key)>
            {{$machine_status}}
        </option>
    @endforeach
</select>
<br>
<label for="product_id">品番</label>
<select id ="product_id" name="product_id">
    <option value=""></option>
    @foreach($products as $product)
        <option value="{{$product->id}}" @selected(old('product_id', $machine->product_id ?? null) == $product->id)>
            {{$product->product_number}}
        </option>
    @endforeach
</select>
<br>
<label for="size_id">サイズ</label>
<input type="hidden" id="old_size_id" value="{{old('size_id', $machine->size_id ?? null)}}">
<select id="size_id" name="size_id"><option></option></select>
<br>
<label for="symbol_id">識別記号</label>
<input type="hidden" id="old_symbol_id" value="{{old('symbol_id', $machine->symbol_id ?? null)}}">
<select id="symbol_id" name="symbol_id"><option></option></select>
<br>
