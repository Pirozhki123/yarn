<div class="form-group mb-3 mt-3">
    <label for="product_number" class="form-label">品番</label>
    <input type="text" class="form-control" id="product_number" name="product_number" value="{{old('product_number', $product->product_number ?? null)}}">
</div>
<div class="form-group mb-3">
    <label for="memo" class="form-label">備考</label>
    <textarea id="memo" class="form-control" name="memo">{{old('memo', $product->memo ?? null)}}</textarea>
</div>
