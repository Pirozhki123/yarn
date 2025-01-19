@include('head')
@include('components.header')
@include('parts.messages')
<h1>備品編集</h1>
<form action="{{route('equipment.update', $equipment['id'])}}" method="POST" class="form">
    @csrf
    @method('PUT')
    @include('equipment.partials.form')
    <button type="submit" value="変更">変更</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
