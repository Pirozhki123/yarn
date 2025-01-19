<div class="equipment_sub_group">
    <label for="equipment[]">備品名</label>
    <select id="equipment[]" name="equipment_id[]">
        @foreach($equipment as $equipment_item)
            <option value="{{$equipment_item['id']}}" @selected(isset($oldEquipmentId) && $oldEquipmentId == $equipment_item['id'])>
                {{$equipment_item['equipment_name']}}
            </option>
        @endforeach
    </select>
    <label for="quantity[]">交換数</label>
    <input type="number" id="quantity[]" name="quantity[]" value="{{$oldQuantity ?? null}}">
    <br>
</div>
