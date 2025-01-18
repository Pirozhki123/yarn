@include('head')
@include('layouts.header')
@include('parts.messages')
<h1>ユーザー編集</h1>
<form action="{{route('user.update', $user['id'])}}" method="POST" class="form">
    @csrf
    @method('PUT')
    @include('user.partials.form')
    <button type="submit" value="変更">変更</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
