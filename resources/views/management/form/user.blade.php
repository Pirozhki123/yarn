<label for="name">Eメールアドレス</label>
<input type="email" name="email" value="{{$viewItem['email'] ?? null}}">
<br>
<label for="name">パスワード</label>
<input type="password" name="password" value="{{$viewItem['password'] ?? null}}">
<br>
<label for="name">社員番号</label>
<input type="number" name="number" value="{{$viewItem['number'] ?? null}}">
<br>
<label for="name">氏名</label>
<input type="text" name="name" value="{{$viewItem['name'] ?? null}}">
<br>
<button type="submit" value="登録">登録</button>
