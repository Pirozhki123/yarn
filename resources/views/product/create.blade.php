@extends('layouts.app')

@section('title', '製品追加')

@section('content')
    <form action="{{route('product.store')}}" method="POST" class="form">
        @csrf
        @include('product.partials.form')
        <button type="submit" value="登録">登録</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
@endsection
