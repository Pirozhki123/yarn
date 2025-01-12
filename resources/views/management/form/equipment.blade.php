<label for="equipment_name">備品名</label>
<input type="text" id="equipment_name" name="equipment_name" value="{{old('equipment_name', $viewItem['equipment_name'] ?? null)}}">
<br>
<label for="quantity">在庫数</label>
<input type="number" id="quantity" name="quantity" value="{{old('quantity', $viewItem['quantity'] ?? null)}}">
<br>
