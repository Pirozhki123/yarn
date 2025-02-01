@extends('layouts.app')

@section('title', '報告編集')

@section('content')
<div class="row block-center">
    <div class="col-md-3"></div>
    <div class="col-md-6 mt-5 center-block bg-light">
        <h1 class="m-2 text-center">報告編集</h1>
        <form action="{{route('report.update', $report->id)}}" method="POST" class="form">
            @csrf
            @method('PUT')
            @include('report.partials.form')
            <button class="btn btn-sm btn-primary" type="submit" value="変更">変更</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection

<script src="{{asset('/js/form.js')}}"></script>
<script src="{{asset('/js/report_form.js')}}"></script>
