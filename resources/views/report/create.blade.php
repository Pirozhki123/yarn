@extends('layouts.app')

@section('title', '新規報告')

@section('content')
    <div class="row block-center">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 mb-5 p-4 center-block bg-light">
            <h1 class="h1 m-2 text-center">{{config('constants.report_types.' . $report_type)}} 報告</h1>
            <form action="{{route('report.store')}}" method="POST" class="form">
                @csrf
                @include('report.partials.form.'. $report_type)
                <button class="btn btn-sm btn-primary" type="submit" value="登録">登録</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('/js/form.js')}}"></script>
@endpush
