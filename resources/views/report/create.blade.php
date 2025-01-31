@extends('layouts.app')

@section('title', '新規報告')

@section('content')
    <div class="row block-center">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 center-block bg-light">
            <h1 class="m-2 text-center">新規報告</h1>
            <form action="{{route('report.store')}}" method="POST" class="form">
                @csrf
                @include('report.partials.form')
                <button class="btn btn-sm btn-primary" type="submit" value="登録">登録</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

<script src="{{asset('/js/form.js')}}"></script>
<script src="{{asset('/js/report_form.js')}}"></script>
