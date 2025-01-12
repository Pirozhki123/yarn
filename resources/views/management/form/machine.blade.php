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
<select id="lane_number", name="lane_number">
    @for($i = 1; $i <= 6; $i++)
        <option value="{{$i}}" {{old('lane_number', $viewItem['lane_number'] ?? null) == $i ? 'selected' : null;}}>
            {{$i}}
        </option>
    @endfor
</select>
-
<select id="machine_number", name="machine_number">
    @for($i = 1; $i <= 70; $i++)
        <option value="{{$i}}" {{old('machine_number', $viewItem['machine_number'] ?? null) == $i ? 'selected' : null;}}>
            {{$i}}
        </option>
    @endfor
</select>
<br>
<label for="machine_status_id">稼働状況</label>
<select id ="machine_status_id" name="machine_status_id">
    @foreach($formInfo['machine_statuses'] as $machine_status)
        <option value="{{$machine_status['id']}}" {{old('machine_status_id', $viewItem['machine_status_id'] ?? null) == $machine_status['id'] ? 'selected' : null;}}>
            {{$machine_status['machine_status']}}
        </option>
    @endforeach
</select>
<br>
<label for="product_id">品番</label>
<select id ="product_id" name="product_id">
    @foreach($formInfo['products'] as $product)
        <option value="{{$product['id']}}" {{old('product_id', $viewItem['product_id'] ?? null) == $product['id'] ? 'selected' : null;}}>
            {{$product['product_number']}}
        </option>
    @endforeach
</select>
<br>
<label>サイズ</label>
<p>TODO:非同期通信実装予定</p>
<br>
<label>識別記号</label>
<p>TODO:非同期通信実装予定</p>
<br>
