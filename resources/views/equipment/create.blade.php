@extends('layouts.app')

@section('title', '備品追加')

@section('content')
    <form action="{{route('equipment.store')}}" method="POST" class="form">
        @csrf
        @include('equipment.partials.form')
        <button type="submit" value="登録">登録</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
@endsection
