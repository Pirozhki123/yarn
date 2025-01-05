<h1>{{$viewInfo['name']}}詳細</h1>
<a href="{{$viewInfo['route']}}/edit/{{$viewItem['id']}}">{{$viewInfo['name']}}編集</a>
<a href="{{$viewInfo['route']}}">{{$viewInfo['name']}}一覧</a>
<p>{{$viewItem}}</p>
@include('parts.view-item-relations')
