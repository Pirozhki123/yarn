<div class="form-group mb-3 mt-3">
    <label for="email" class="form-label">Eメールアドレス</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email ?? null)}}">
</div>
<div class="form-group mb-3">
    <label for="password">パスワード</label>
    <input type="password" class="form-control" id="password" name="password" value="{{old('password', $user->password ?? null)}}">
</div>
<div class="form-group mb-3">
    <label for="number">社員番号</label>
    <input type="number" class="form-control" id="number" name="number" value="{{old('number', $user->number ?? null)}}">
</div>
<div class="form-group mb-3">
    <label for="name">氏名</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name ?? null)}}">
</div>
<div class="form-group mb-3">
    <input type="checkbox" class="form-check-input" id="admin" name="admin" {{old('admin', $user->admin ?? null) == true ? 'checked' : null}}>
    <label for="admin" class="form-check-label">管理権限</label>
</div>
