@include('head')
@include('components.header')
@include('parts.messages')
<h1>機械編集</h1>
<form action="{{route('machine.update', $machine['id'])}}" method="POST" class="form">
    @csrf
    @method('PUT')
    @include('machine.partials.form')
    <button type="submit" value="変更">変更</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
