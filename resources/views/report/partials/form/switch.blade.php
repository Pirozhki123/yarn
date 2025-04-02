<div class="form-group mb-3 mt-3">
    <input type="hidden" id="report_type" name="report_type" value="{{$report_type}}">
</div>
<div class="form-group mb-3 mt-3">
    <label for="user_id" class="form-label">報告者</label>
    <div class="form-control-plaintext">{{$user->name}}</div>
    <input type="hidden" id="user_id" name="user_id" value="{{$user->id}}">
</div>
<div class="machine_group mb-3">
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
<div class="product_group mb-3">
    <label for="old_product_number" class="form-label">品番</label>
    <div id="old_product_number" class="form-control-plaintext"></div>
    ↓
    <select id="product_id" class="form-control" name="product_id">
        <option value=""></option>
        @foreach($products as $product)
            <option value="{{$product->id}}" @selected(old('product_id', $report->product_id ?? null) == $product->id)>
                {{$product->product_number}}
            </option>
        @endforeach
    </select>
</div>
<div class="size_group mb-3">
    <label for="old_size" class="form-label">サイズ</label>
    <div id="old_size" class="form-control-plaintext"></div>
    ↓
    <select class="form-control" id="size_id" name="size_id"><option></option></select>
</div>
<div class="symbol_group mb-3">
    <label for="old_symbol" class="form-label">識別記号</label>
    <div id="old_symbol" class="form-control-plaintext"></div>
    ↓
    <select  class="form-control" id="symbol_id" name="symbol_id"><option></option></select>
</div>
<div class="machine_status_group">
    <label for="machine_status" class="form-label">稼働状況</label>
    <div class="form-control-plaintext">
        <div id="old_machine_status" class="form-control-plaintext"></div>
        ↓
        <select id="machine_status" name="machine_status" class="form-control">
            <option></option>
            <option value="active">{{config('constants.machine_status.active')}}</option>
            <option value="inspecting">{{config('constants.machine_status.inspecting')}}</option>
        </select>
    </div>
</div>
<div class="report_group mb-3">
    <label for="report" class="form-label">報告内容</label><br>
    <textarea id="report" class="form-control" name="report">{{old('report', $report->report ?? null)}}</textarea>
</div>
<div class="equipment_group mb-3">
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
