<label for="user_id">ユーザー</label>
<select id="user_id" name="user_id">
    <option value=""></option>
    @foreach($formInfo['users'] as $user)
        <option value="{{$user['id']}}" @selected(old('user_id', $viewItem['user_id'] ?? null) == $user['id'])>
            {{$user['name']}}
        </option>
    @endforeach
</select>
<br>
<label for="report_type">報告種</label>
<select id="report_type" name="report_type">
    <option value=""></option>
    @foreach(config('constants.report_types') as $key => $report_type)
        <option value="{{$key}}" @selected(old('report_type', $viewItem['report_type'] ?? null) == $key)>
            {{$report_type}}
        </option>
    @endforeach
</select>
<br>
<div class="machine_group" style="display :none">
    <label for="machine_id">機械番号</label>
    <select id="machine_id" name="machine_id">
        <option value=""></option>
        @foreach($formInfo['machines'] as $machine)
            <option value="{{$machine['id']}}" @selected(old('machine_id', $viewItem['machine_id'] ?? null) == $machine['id'])>
                {{$machine['lane_number'] . "-" . $machine['machine_number']}}
            </option>
        @endforeach
    </select>
</div>
<div class="product_group" style="display :none">
    <label for="product_id">品番</label>
    <select id="product_id" name="product_id">
        <option value=""></option>
        @foreach($formInfo['products'] as $product)
            <option value="{{$product['id']}}" @selected(old('product_id', $viewItem['product_id'] ?? null) == $product['id'])>
                {{$product['product_number']}}
            </option>
        @endforeach
    </select>
</div>
<div class="size_group" style="display :none">
    <label for="size_id">サイズ</label>
    <input type="hidden" id="old_size_id" value="{{old('size_id', $viewItem['size_id'] ?? null)}}">
    <select id="size_id" name="size_id"><option></option></select>
</div>
<div class="symbol_group" style="display :none">
    <label for="symbol_id">識別記号</label>
    <input type="hidden" id="old_symbol_id" value="{{old('symbol_id', $viewItem['symbol_id'] ?? null)}}">
    <select id="symbol_id" name="symbol_id"><option></option></select>
</div>
<div class="equipment_group" style="display :none">
    <label>備品交換</label>
    <input type="button" class="add_equipment_button" value="追加">
    <input type="button" class="delete_equipment_button" value="削除">
    @if(old('equipment_id'))
        @foreach(old('equipment_id') as $key => $oldEquipmentId)
            @include('management.form.report_equipment', [
                'oldEquipmentId' => $oldEquipmentId,
                'oldQuantity' => old('quantity.' . $key),
            ])
        @endforeach
    @elseif(isset($viewItem['equipments']))
        @foreach($viewItem['equipments'] as $equipment)
            @include('management.form.report_equipment', [
                'oldEquipmentId' => $equipment->pivot->equipment_id,
                'oldQuantity' => $equipment->pivot->quantity,
            ])
        @endforeach
    @endif
</div>
<div class="option_group" style="display:none">
    <input type="checkbox" id="stop_machine" class="stop_machine" name="stop_machine">
    <label for="stop_machine" class="stop_machine">機械停止</label>
    <input type="checkbox" id="check_passed" class="check_passed" name="stop_machine">
    <label for="check_passed" class="check_passed">検査合格</label>
    <input type="checkbox" id="required_check" class="required_check" name="required_check">
    <label for="required_check" class="required_check">検査必要</label>
</div>
<div class="report_group" style="display :none">
    <label for="report">報告・作業内容</label><br>
    <textarea id="report" name="report">{{old('report', $viewItem['report'] ?? null)}}</textarea>
</div>
<br>
