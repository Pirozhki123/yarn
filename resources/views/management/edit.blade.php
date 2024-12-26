<h1>{{$viewInfo['name']}}編集</h1>
<a href="{{$viewInfo['route']}}/confirm">{{$viewInfo['name']}}確認</a>
<a href="{{$viewInfo['route']}}">{{$viewInfo['name']}}一覧</a>
<br>
<form action="{{route($viewInfo['key'] . '.update', $viewItem['id'])}}" method="POST" class="form">
    @csrf
    @method('PUT')
    @switch($viewInfo['key'])
        @case('equipment')
            @include('management.form.equipment')
            @break
    @endswitch
</form>
