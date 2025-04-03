@extends('layouts.app')

@section('title', '製品詳細')

@section('content')
    <div class="row block-center">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5 center-block bg-light rounded">
            <h1 class="h1 m-2 text-center">製品詳細</h1>
            <div class="button-group mt-2 mb-2 d-flex justify-content-end">
                <form action="{{route('product.edit', $product->id)}}" method="GET" class="get_form">
                    @csrf
                    <button class="btn btn-sm btn-primary" type="submit">編集</button>
                </form>
                <form action="{{route('product.destroy', $product->id)}}" method="POST" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger ml-2" type="submit">削除</button>
                </form>
            </div>
                <table class="table table-striped table-hover text-center mx-auto">
                    <thead>
                        <tr>
                            <th>品番</th>
                            <th>備考</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$product->product_number}}</td>
                            <td>{{$product->memo}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-4 center-block bg-light rounded-start">
                <h2 class="m-2 text-center">サイズ</h2>
                <form action="{{route('size.store', $product['id'])}}" method="POST" class="form">
                    @csrf
                    @method('POST')
                    <label for="size" class="form-label">サイズ追加</label>
                    <input type="text" class="form-control" id="size" name="size">
                    <button class="btn btn-sm btn-primary" type="submit" value="追加">追加</button>
                </form>
                <table class="table table-striped table-hover text-center mx-auto">
                    <thead>
                        <tr>
                            <th>サイズ</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->sizes as $size)
                            <tr>
                                <td>{{$size->size}}</td>
                                <td>
                                    <form action="{{route('size.destroy', $size['id'])}}" method="POST" class="delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 center-block bg-light rounded-end">
                <h2 class="m-2 text-center">識別記号</h2>
                <form action="{{route('symbol.store', $product['id'])}}" method="POST" class="form">
                    @csrf
                    @method('POST')
                    <label for="symbol" class="form-label">識別記号追加</label>
                    <input type="text" class="form-control" id="symbol" name="symbol">
                    <button class="btn btn-sm btn-primary" type="submit" value="追加">追加</button>
                </form>
                <table class="table table-striped table-hover text-center mx-auto">
                    <thead>
                        <tr>
                            <th>識別記号</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product->symbols as $symbol)
                            <tr>
                                <td>{{$symbol->symbol}}</td>
                                <td>
                                    <form action="{{route('symbol.destroy', $symbol->id)}}" method="POST" class="delete_form">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
@endsection
