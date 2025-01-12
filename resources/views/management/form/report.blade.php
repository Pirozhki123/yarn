<label for="user_id">ユーザー</label>
<select id="user_id" name="user_id">
    @foreach($formInfo['users'] as $user)
        <option value="{{$user['id']}}" {{old('user_id', $viewItem['user_id'] ?? null) == $user['id'] ? 'selected' : null;}}>
            {{$user['name']}}
        </option>
    @endforeach
</select>
<br>
<label for="report_type_id">報告種</label>
<select id="report_type_id" name="report_type_id">
    @foreach($formInfo['report_types'] as $report_type)
        <option value="{{$report_type['id']}}" {{old('report_type_id', $viewItem['report_type_id'] ?? null) == $report_type['id'] ? 'selected' : null}}>
            {{$report_type['report_type']}}
        </option>
    @endforeach
</select>
<br>
<label for="machine_id">機械番号</label>
<select id="machine_id" name="machine_id">
    @foreach($formInfo['machines'] as $machine)
        <option value="{{$machine['id']}}" {{old('machine_id', $viewItem['machine_id'] ?? null) == $machine['id'] ? 'selected' : null}}>
            {{$machine['lane_number'] . "-" . $machine['machine_number']}}
        </option>
    @endforeach
</select>
<br>
<label for="product_id">品番</label>
<select id="product_id" name="product_id">
    @foreach($formInfo['products'] as $product)
        <option value="{{$product['id']}}" {{old('product_id', $viewItem['product_id'] ?? null) == $product['id'] ? 'selected' : null}}>
            {{$product['product_number']}}
        </option>
    @endforeach
</select>
<br>
<label for="size_id">サイズ</label>
<select id="size_id" name="size_id"><option></option></select>
<br>
<label for="symbol_id">識別記号</label>
<select id="symbol_id" name="symbol_id"><option></option></select>
<br>
<label for="equipment">交換備品</label>
<select id="equipment" name="equipment_id">
    @foreach($formInfo['equipment'] as $equipment)
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
