<h1>{{$viewInfo['name']}}編集</h1>
<a href="{{$viewInfo['route']}}/confirm/{{$viewItem['id']}}">{{$viewInfo['name']}}確認</a>
<a href="{{$viewInfo['route']}}">{{$viewInfo['name']}}一覧</a>
<br>
<form action="{{route($viewInfo['key'] . '.update', $viewItem['id'])}}" method="POST" class="form">
    @csrf
    @method('PUT')
    @include('management.form.switch')
</form>
@if($viewInfo['key'] == 'product')
    @include('parts.view-item-relations')
@endif
