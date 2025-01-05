<label for="name">品番</label>
<input type="text" name="product_number" value="{{$viewItem['product_number'] ?? null}}">
<br>
<label for="name">備考</label>
<textarea name="memo">{{$viewItem['memo'] ?? null}}</textarea>
<br>
<button type="submit" value="登録">登録</button>
