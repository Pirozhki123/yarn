@extends('layouts.app')

@section('title', 'ユーザー追加')

@section('content')
    <div class="row block-center">
        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5 p-3 center-block bg-light rounded">
            <h1 class="h1 m-2 text-center">ユーザー追加</h1>
            <form action="{{route('user.store')}}" method="POST" class="form">
                @csrf
                @include('user.partials.form')
                <button class="btn btn-sm btn-primary" type="submit" value="登録">登録</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('/js/form.js')}}"></script>
@endpush
