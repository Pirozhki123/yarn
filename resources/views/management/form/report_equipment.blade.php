<div class="equipment_sub_group">
    <label for="equipment[]">備品名</label>
    <select id="equipment[]" name="equipment_id[]">
        @foreach($formInfo['equipment'] as $equipment)
            <option value="{{$equipment['id']}}" @selected(isset($oldEquipmentId) && $oldEquipmentId == $equipment['id'])>
                {{$equipment['equipment_name']}}
            </option>
        @endforeach
    </select>
    <label for="quantity[]">交換数</label>
    <input type="number" id="quantity[]" name="quantity[]" value="{{$oldQuantity ?? null}}">
    <br>
</div>
