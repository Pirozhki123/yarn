@extends('layouts.app')

@section('title', '機械追加')

@section('content')
<div class="row block-center">
    <div class="col-md-3"></div>
    <div class="col-md-6 mt-5 center-block bg-light">
        <h1 class="h1 m-2 text-center">機械追加</h1>
        <form action="{{route('machine.store')}}" method="POST" class="form">
            @csrf
            @include('machine.partials.form')
            <button class="btn btn-sm btn-primary" type="submit" value="登録">登録</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('/js/form.js')}}"></script>
@endpush
