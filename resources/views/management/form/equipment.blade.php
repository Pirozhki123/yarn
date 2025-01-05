<label for="name">備品名</label>
<input type="text" name="equipment_name" value="{{$viewItem['equipment_name'] ?? null}}">
<br>
<label for="quantity">在庫数</label>
<input type="number" name="quantity" value="{{$viewItem['quantity'] ?? null}}">
<br>
<button type="submit" value="登録">登録</button>
