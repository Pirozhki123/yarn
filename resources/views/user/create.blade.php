@include('head')
@include('components.header')
@include('parts.messages')
<h1>ユーザー追加</h1>
<form action="{{route('user.store')}}" method="POST" class="form">
    @csrf
    @include('user.partials.form')
    <button type="submit" value="登録">登録</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
