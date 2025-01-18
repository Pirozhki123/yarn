@include('head')
@include('components.header')
@include('parts.messages')
<h1>製品追加</h1>
<form action="{{route('product.store')}}" method="POST" class="form">
    @csrf
    @include('product.partials.form')
    <button type="submit" value="登録">登録</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
