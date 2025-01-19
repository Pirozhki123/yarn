@extends('layouts.app')

@section('title', '報告編集')

@section('content')
    <form action="{{route('report.update', $report->id)}}" method="POST" class="form">
        @csrf
        @method('PUT')
        @include('report.partials.form')
        <button type="submit" value="変更">変更</button>
    </form>
    <script src="{{asset('/js/form.js')}}"></script>
    <script src="{{asset('/js/report_form.js')}}"></script>
@endsection
