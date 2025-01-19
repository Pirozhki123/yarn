@extends('layouts.app')

@section('title', 'ユーザー追加')

@section('content')
    <form action="{{route('user.store')}}" method="POST" class="form">
        @csrf
        @include('user.partials.form')
        <button type="submit" value="登録">登録</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
@endsection
