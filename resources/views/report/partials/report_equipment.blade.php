<div class="equipment_sub_group">
    <label for="equipment[]" class="form-label">備品名</label>
    <select id="equipment[]" class="form-control" name="equipment_id[]">
        @foreach($equipment as $equipment_item)
            <option value="{{$equipment_item['id']}}" @selected(isset($oldEquipmentId) && $oldEquipmentId == $equipment_item['id'])>
                {{$equipment_item['equipment_name']}}
            </option>
        @endforeach
    </select>
    <label for="quantity[]" class="form-label">交換数</label>
    <input type="number" class="form-control" id="quantity[]" name="quantity[]" value="{{$oldQuantity ?? null}}">
    <br>
</div>
