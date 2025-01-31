@extends('layouts.app')

@section('title', '機械一覧')

@section('content')
<div class="row center-block">
    <div class="col-md-1"></div>
    <div class="col-md-3 mt-5 center-block bg-light operating_rates_group">
        <h1 class="m-2 text-center">稼働率</h1>
        <table class="table table-striped table-hover text-center mx-auto">
            <thead>
                <tr>
                    <th>レーン</th>
                    <th>稼働率</th>
                    <th>稼働台数</th>
                    <th>故障台数</th>
                </tr>
            </thead>
            <tbody>
                @foreach($operatingRates as $laneNumber => $operatingRateInfo)
                    <tr>
                        <td>{{$laneNumber}}</td>
                        <td>{{$operatingRateInfo['operatingRate']}}％</td>
                        <td>{{$operatingRateInfo['activeMachineCount']}}</td>
                        <td>{{$operatingRateInfo['faultMachineCount']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mx-auto">
            <canvas id="polarChart"></canvas>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-6 mt-5 overflow-x-auto center-block bg-light">
        <h1 class="m-2 text-center">最新の報告</h1>
        <table class="table table-striped table-hover text-center mx-auto" id="latest_reports">
            <thead>
                <tr>
                    <th class="text-nowrap">報告種</th>
                    <th class="text-nowrap">機械番号</th>
                    <th class="text-nowrap">品番</th>
                    <th class="text-nowrap">サイズ</th>
                    <th class="text-nowrap">識別記号</th>
                    <th class="text-nowrap">報告内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach($latestReportsData as $latestReportData)
                    <tr>
                        <td class="text-nowrap">{{$latestReportData['report_type']}}</td>
                        <td class="text-nowrap">{{$latestReportData['machine_number']}}</td>
                        <td class="text-nowrap">{{$latestReportData['product_number']}}</td>
                        <td class="text-nowrap">{{$latestReportData['size']}}</td>
                        <td class="text-nowrap">{{$latestReportData['symbol']}}</td>
                        <td class="text-nowrap" style="overflow: hidden; text-overflow: ellipsis; max-width: 200px;">{{$latestReportData['report']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-1"></div>
</div>
<script>
    let polarCtx = document.getElementById("polarChart");
    let polarChart = new Chart(polarCtx, @json($polarConfig));
</script>
@endsection
