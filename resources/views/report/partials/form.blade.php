<div class="form-group mb-3 mt-3">
    <label for="user_id" class="form-label">報告者</label>
    <select class="form-control" id="user_id" name="user_id">
        <option value=""></option>
        @foreach($users as $user)
            <option value="{{$user->id}}" @selected(old('user_id', $report->user_id ?? null) == $user->id)>
                {{$user->name}}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group mb-3">
    <label for="report_type" class="form-label">報告種</label>
    <select id="report_type" class="form-control" name="report_type">
        <option value=""></option>
        @foreach(config('constants.report_types') as $key => $report_type)
            <option value="{{$key}}" @selected(old('report_type', $report->report_type ?? null) == $key)>
                {{$report_type}}
            </option>
        @endforeach
    </select>
</div>
<div class="machine_group mb-3" style="display :none">
    <label for="machine_id" class="form-label">機械番号</label>
    <select id="machine_id" class="form-control" name="machine_id">
        <option value=""></option>
        @foreach($machines as $machine)
            <option value="{{$machine->id}}" @selected(old('machine_id', $report->machine_id ?? null) == $machine->id)>
                {{$machine->lane_number . "-" . $machine->machine_number}}
            </option>
        @endforeach
    </select>
</div>
<div class="product_group mb-3" style="display :none">
    <label for="product_id" class="form-label">品番</label>
    <select id="product_id" class="form-control" name="product_id">
        <option value=""></option>
        @foreach($products as $product)
            <option value="{{$product->id}}" @selected(old('product_id', $report->product_id ?? null) == $product->id)>
                {{$product->product_number}}
            </option>
        @endforeach
    </select>
</div>
<div class="size_group mb-3" style="display :none">
    <label for="size_id" class="form-label">サイズ</label>
    <input type="hidden" class="form-control" id="old_size_id" value="{{old('size_id', $report->size_id ?? null)}}">
    <select class="form-control" id="size_id" name="size_id"><option></option></select>
</div>
<div class="symbol_group mb-3" style="display :none">
    <label for="symbol_type" class="form-label">識別記号</label>
    <div class="symbol_type">
        <label class="form-label">
            <input type="radio" class="form-control" name="symbol_type" value="existing" checked>既存
        </label>
        <label class="form-label">
            <input type="radio" class="form-control" name="symbol_type" value="new">新規
        </label>
    </div>
    <div class="symbol_select">
        <input type="hidden" id="old_symbol_id" value="{{old('symbol_id', $report->symbol_id ?? null)}}">
        <select  class="form-control" id="symbol_id" name="symbol_id"><option></option></select>
    </div>
    <div class="symbol_input" style="display: none">
        <input class="form-control" type="text" id="symbol" name="symbol" value="{{old('symbol')}}">
    </div>
</div>
<div class="equipment_group mb-3" style="display :none">
    <label class="form-label">備品交換</label>
    <input type="button" class="add_equipment_button btn btn-sm btn-primary" value="追加">
    <input type="button" class="delete_equipment_button btn btn-sm btn-danger" value="削除">
    @if(old('equipment_id'))
        @foreach(old('equipment_id') as $key => $oldEquipmentId)
            @include('report.partials.report_equipment', [
                'oldEquipmentId' => $oldEquipmentId,
                'oldQuantity' => old('quantity.' . $key),
            ])
        @endforeach
    @elseif(!empty($report->equipment))
        @foreach($report->equipment as $equipment_item)
            @include('report.partials.report_equipment', [
                'oldEquipmentId' => $equipment_item->pivot->equipment_id,
                'oldQuantity' => $equipment_item->pivot->quantity,
            ])
        @endforeach
    @endif
</div>
<!-- FIXME:optionの値が保持されない問題 -->
<div class="option_group mb-3" style="display:none">
    <input type="checkbox" id="stop_machine" class="stop_machine form-check-input" name="stop_machine">
    <label for="stop_machine"class="stop_machine form-check-label">機械停止</label>
    <input type="checkbox" id="check_passed" class="check_passed form-check-input" name="stop_machine">
    <label for="check_passed" class="check_passed form-check-label">検査合格</label>
    <input type="checkbox" id="required_check" class="required_check form-check-input" name="required_check">
    <label for="required_check" class="required_check form-check-label">検査必要</label>
</div>
<div class="report_group mb-3" style="display :none">
    <label for="report" class="form-label">報告内容</label><br>
    <textarea id="report" class="form-control" name="report">{{old('report', $report->report ?? null)}}</textarea>
</div>
<br>
