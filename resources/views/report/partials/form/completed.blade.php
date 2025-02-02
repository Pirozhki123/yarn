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
    <input type="hidden" id="product_id" name="product_id" value="{{$machine->product->id}}">
</div>
<div class="size_group mb-3">
    <label for="old_size" class="form-label">サイズ</label>
    <div id="old_size" class="form-control-plaintext"></div>
    <input type="hidden" id="size_id" name="size_id" value="{{$machine->size->id}}">
</div>
<div class="symbol_group mb-3">
    <label for="old_symbol" class="form-label">識別記号</label>
    <div id="old_symbol" class="form-control-plaintext"></div>
    <input type="hidden" id="symbol_id" name="symbol_id" value="{{$machine->symbol->id}}">
</div>
<div class="machine_status_group">
    <label for="machine_status" class="form-label">稼働状況</label>
    <div class="form-control-plaintext">
        <div id="old_machine_status" class="form-control-plaintext"></div>
        ↓
        <div id="old_machine_status" class="form-control-plaintext">終了</div>
        <input type="hidden" id="machine_status" value="completed">
    </div>
</div>
<div class="report_group mb-3">
    <label for="report" class="form-label">報告内容</label><br>
    <textarea id="report" class="form-control" name="report">{{old('report', $report->report ?? null)}}</textarea>
</div>
