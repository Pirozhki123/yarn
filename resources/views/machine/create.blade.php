@include('head')
@include('components.header')
@include('parts.messages')
<h1>機械追加</h1>
<form action="{{route('machine.store')}}" method="POST" class="form">
    @csrf
    @include('machine.partials.form')
    <button type="submit" value="登録">登録</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
