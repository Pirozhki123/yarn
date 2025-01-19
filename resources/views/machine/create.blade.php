@extends('layouts.app')

@section('title', '機械追加')

@section('content')
    <form action="{{route('machine.store')}}" method="POST" class="form">
        @csrf
        @include('machine.partials.form')
        <button type="submit" value="登録">登録</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
@endsection
