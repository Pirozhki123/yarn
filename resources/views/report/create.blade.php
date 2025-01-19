@include('head')
@include('components.header')
@include('parts.messages')
<h1>新規報告</h1>
<form action="{{route('report.store')}}" method="POST" class="form">
    @csrf
    @include('report.partials.form')
    <button type="submit" value="登録">登録</button>
</form>
<script src="{{asset('/js/form.js')}}"></script>
<script src="{{asset('/js/report_form.js')}}"></script>
