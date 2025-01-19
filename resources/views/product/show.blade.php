@include('head')
@include('components.header')
@include('parts.messages')
<h1>製品詳細</h1>
<form action="{{route('product.edit', $product->id)}}" method="GET" class="get_form">
    @csrf
    <button type="submit">編集</button>
</form>
<form action="{{route('product.destroy', $product->id)}}" method="POST" class="delete_form">
    @csrf
    @method('DELETE')
    <button type="submit">削除</button>
</form>
<table>
    <tr>
        <th>品番</th>
        <th>備考</th>
    </tr>
    <tr>
        <td>{{$product->product_number}}</td>
        <td>{{$product->memo}}</td>
    </tr>
</table>
<h2>サイズ</h2>
<form action="{{route('size.store', $product['id'])}}" method="POST" class="form">
    @csrf
    @method('POST')
    <label for="size">サイズ追加</label>
    <input type="text" id="size" name="size">
    <button type="submit" value="追加">追加</button>
</form>
<table>
    <tr>
        <th>サイズ</th>
        <th>削除</th>
    </tr>
    @foreach($product->sizes as $size)
        <tr>
            <td>{{$size->size}}</td>
            <td>
                <form action="{{route('size.destroy', $size['id'])}}" method="POST" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

<h2>識別記号</h2>
<form action="{{route('symbol.store', $product['id'])}}" method="POST" class="form">
    @csrf
    @method('POST')
    <label for="symbol">識別記号追加</label>
    <input type="text" id="symbol" name="symbol">
    <button type="submit" value="追加">追加</button>
</form>
<table>
    <tr>
        <th>識別記号</th>
        <th>削除</th>
    </tr>
    @foreach($product->symbols as $symbol)
        <tr>
            <td>{{$symbol->symbol}}</td>
            <td>
                <form action="{{route('symbol.destroy', $symbol->id)}}" method="POST" class="delete_form">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
