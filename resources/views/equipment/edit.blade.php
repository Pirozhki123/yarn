@extends('layouts.app')

@section('title', '備品編集')

@section('content')
    <form action="{{route('equipment.update', $equipment['id'])}}" method="POST" class="form">
        @csrf
        @method('PUT')
        @include('equipment.partials.form')
        <button type="submit" value="変更">変更</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
@endsection
