<label for="product_number">品番</label>
<input type="text" id="product_number" name="product_number" value="{{$viewItem['product_number'] ?? null}}">
<br>
<label for="memo">備考</label>
<textarea id="memo" name="memo">{{$viewItem['memo'] ?? null}}</textarea>
<br>
<button type="submit" value="登録">登録</button>
