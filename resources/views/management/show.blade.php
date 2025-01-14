@include('head')
@include('parts.messages')
<h1>{{$viewInfo['name']}}詳細</h1>
<a href="{{$viewInfo['route']}}/edit/{{$viewItem['id']}}">{{$viewInfo['name']}}編集</a>
<a href="{{$viewInfo['route']}}">{{$viewInfo['name']}}一覧</a>
<p>{{$viewItem}}</p>

@if($viewInfo['key'] == 'product')
    <h2>サイズ</h2>
    <form action="{{route('size.store', $viewItem['id'])}}" method="POST" class="form">
        @csrf
        @method('POST')
        <label for="size">サイズ追加</label>
        <input type="text" id="size" name="size">
        <button type="submit" value="追加">追加</button>
    </form>
    @foreach($viewItem['sizes'] as $value)
        <form action="{{route('size.destroy', $value['id'])}}" method="POST" class="delete_form">
            @csrf
            @method('DELETE')
            {{$value}}
            <button type="submit">削除</button>
        </form>
    @endforeach

    <h2>記号</h2>
    <form action="{{route('symbol.store', $viewItem['id'])}}" method="POST" class="form">
        @csrf
        @method('POST')
        <label for="symbol">識別記号追加</label>
        <input type="text" id="symbol" name="symbol">
        <button type="submit" value="追加">追加</button>
    </form>
    @foreach($viewItem['symbols'] as $value)
        <form action="{{route('symbol.destroy', $value['id'])}}" method="POST" class="delete_form">
            @csrf
            @method('DELETE')
            {{$value}}
            <button type="submit">削除</button>
        </form>
    @endforeach
@endif
