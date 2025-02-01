@extends('layouts.app')

@section('title', '製品一覧')

@section('content')
    <div class="row center-block">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 center-block bg-light">
            <h1 class="m-2 text-center">製品一覧</h1>
            <div class="button-group mt-2 mb-2 d-flex justify-content-end">
                <a class="btn btn-sm btn-primary" href="/product/create">新規</a>
            </div>
            @if(!empty($products->all()))
            <table class="table table-striped table-hover text-center mx-auto">
                <thead>
                    <tr>
                        <th>品番</th>
                        <th>備考</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->product_number}}</td>
                            <td>{{$product->memo}}</td>
                            <td>
                                <a class="btn btn-sm btn-secondary" href="/product/show/{{$product->id}}">詳細</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection
