<label for="user">ユーザー</label>
<select id="user" name="user_id">
    @foreach($viewItemRelations['user']['values'] as $user)
        <option value="{{$user['id']}}" {{old('user_id', $viewItem['user_id'] ?? null) == $user['id'] ? 'selected' : null;}}>
            {{$user['name']}}
        </option>
    @endforeach
</select>
<br>
<label for="report_type">報告種</label>
<select id="report_type" name="report_type_id">
    @foreach($viewItemRelations['report_type']['values'] as $report_type)
        <option value="{{$report_type['id']}}" {{old('report_type_id', $viewItem['report_type_id'] ?? null) == $report_type['id'] ? 'selected' : null}}>
            {{$report_type['report_type']}}
        </option>
    @endforeach
</select>
<br>
<label for="machine">機械番号</label>
<select id="machine" name="machine_id">
    @foreach($viewItemRelations['machine']['values'] as $machine)
        <option value="{{$machine['id']}}" {{old('machine_id', $viewItem['machine_id'] ?? null) == $machine['id'] ? 'selected' : null}}>
            {{$machine['lane_number'] . "-" . $machine['machine_number']}}
        </option>
    @endforeach
</select>
<br>
<label for="product">品番</label>
<select id="product" name="product_id">
    @foreach($viewItemRelations['product']['values'] as $product)
        <option value="{{$product['id']}}" {{old('product_id', $viewItem['product_id'] ?? null) == $product['id'] ? 'selected' : null}}>
            {{$product['product_number']}}
        </option>
    @endforeach
</select>
<label for="size">サイズ</label>
<select id="size" name="size_id">
    @foreach($viewItemRelations['size']['values'] as $size)
        <option value="{{$size['id']}}" {{old('size_id', $viewItem['size_id'] ?? null) == $size['id'] ? 'selected' : null}}>
            {{$size['size']}}
        </option>
    @endforeach
</select>
<label for="symbol">記号</label>
<select id="symbol" name="symbol_id">
    @foreach($viewItemRelations['symbol']['values'] as $symbol)
        <option value="{{$symbol['id']}}" {{old('symbol_id', $viewItem['symbol_id'] ?? null) == $symbol['id'] ? 'selected' : null}}>
            {{$symbol['symbol']}}
        </option>
    @endforeach
</select>
<br>
<label for="equipment">交換備品</label>
<select id="equipment" name="equipment_id">
    @foreach($viewItemRelations['equipment']['values'] as $equipment)
        <option value="{{$equipment['id']}}" {{old('equipment_id', $viewItem['equipment_id'] ?? null) == $equipment['id'] ? 'selected' : null}}>
            {{$equipment['equipment_name']}}
        </option>
    @endforeach
</select>
<label for="quantity">交換数</label>
<input type="number" id="quantity" name="quantity" value="{{old('quantity', $viewItem['quantity'] ?? null)}}"><br>
<label for="report">報告・作業内容</label><br>
<textarea id="report" name="report">{{old('report', $viewItem['report'] ?? null)}}</textarea>
<br>
<button type="submit" value="登録">登録</button>
