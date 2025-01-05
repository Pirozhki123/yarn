<h1>{{$viewInfo['name']}}追加</h1>
<a href="{{$viewInfo['route']}}/confirm">{{$viewInfo['name']}}確認</a>
<a href="{{$viewInfo['route']}}">{{$viewInfo['name']}}一覧</a>
<br>
<form action="{{route($viewInfo['key'] . '.store')}}" method="POST" class="form">
    @csrf
    @include('management.form.switch')
</form>
