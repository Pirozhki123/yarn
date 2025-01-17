@include('head')
@include('parts.messages')
<h1>{{$viewInfo['name']}}追加</h1>
<a href="{{$viewInfo['route']}}/confirm">{{$viewInfo['name']}}確認</a>
<a href="{{$viewInfo['route']}}">{{$viewInfo['name']}}一覧</a>
<br>
<form action="{{route($viewInfo['key'] . '.store')}}" method="POST" class="form">
    @csrf
    @include('management.form.' . $viewInfo['key'])
    <button type="submit" value="登録">登録</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
@if($viewInfo['key'] == 'report')
    <script src="{{asset('/js/report_form.js')}}"></script>
@endif
