@extends('layouts.app')

@section('title', '製品編集')

@section('content')
    <form action="{{route('product.update', $product->id)}}" method="POST" class="form">
        @csrf
        @method('PUT')
        @include('product.partials.form')
        <button type="submit" value="変更">変更</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
@endsection
