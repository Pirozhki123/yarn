<label for="product_number">品番</label>
<input type="text" id="product_number" name="product_number" value="{{old('product_number', $product->product_number ?? null)}}">
<br>
<label for="memo">備考</label>
<textarea id="memo" name="memo">{{old('memo', $product->memo ?? null)}}</textarea>
<br>
