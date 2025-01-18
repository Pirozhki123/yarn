<label for="email">Eメールアドレス</label>
<input type="email" id="email" name="email" value="{{old('email', $user['email'] ?? null)}}">
<br>
<label for="password">パスワード</label>
<input type="password" id="password" name="password" value="{{old('password', $user['password'] ?? null)}}">
<br>
<label for="number">社員番号</label>
<input type="number" id="number" name="number" value="{{old('number', $user['number'] ?? null)}}">
<br>
<label for="name">氏名</label>
<input type="text" id="name" name="name" value="{{old('name', $user['name'] ?? null)}}">
<br>
