<div class="form-group mb-3">
    <label for="equipment_name" class="form-label">備品名</label>
    <input type="text" class="form-control" id="equipment_name" name="equipment_name" value="{{old('equipment_name', $equipment->equipment_name ?? null)}}">
</div>
<div class="form-group mb-3">
    <label for="quantity" class="form-label">在庫数</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="{{old('quantity', $equipment->quantity ?? null)}}">
</div>
