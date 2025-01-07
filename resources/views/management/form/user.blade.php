<label for="email">Eメールアドレス</label>
<input type="email" id="email" name="email" value="{{$viewItem['email'] ?? null}}">
<br>
<label for="password">パスワード</label>
<input type="password" id="password" name="password" value="{{$viewItem['password'] ?? null}}">
<br>
<label for="number">社員番号</label>
<input type="number" id="number" name="number" value="{{$viewItem['number'] ?? null}}">
<br>
<label for="name">氏名</label>
<input type="text" id="name" name="name" value="{{$viewItem['name'] ?? null}}">
<br>
<button type="submit" value="登録">登録</button>
