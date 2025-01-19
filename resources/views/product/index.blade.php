@extends('layouts.app')

@section('title', '製品一覧')

@section('content')
    <a href="/product/create">新規追加</a>
    @if(!empty($products->all()))
        <table>
            <tr>
                <th>品番</th>
                <th>備考</th>
                <th>詳細</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{$product->product_number}}</td>
                <td>{{$product->memo}}</td>
                <td>
                    <a href="/product/show/{{$product->id}}">詳細</a>
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection
