@extends('layouts.app')

@section('title', '新規報告')

@section('content')
    <form action="{{route('report.store')}}" method="POST" class="form">
        @csrf
        @include('report.partials.form')
        <button type="submit" value="登録">登録</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
    <script src="{{asset('/js/report_form.js')}}"></script>
@endsection
