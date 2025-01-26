@extends('layouts.app')

@section('title', '機械一覧')

@section('content')
<div class="card">
    <div class="card-body">
        <canvas id="polarChart"></canvas>
    </div>
</div>
<script>
    const data = @json($data);
    let polarCtx = document.getElementById("polarChart");
    let polarConfig = {
        type: 'pie',
        data: {
            labels: data.labels,
            datasets: [{
                label: '稼働状況',
                data: data.data,
                backgroundColor: [
                    '#ff0000',
                    '#0000ff',
                    '#ffff00',
                    '#008000',
                    '#ffa500',
                ]
            }]
        },
    };
    let polarChart = new Chart(polarCtx, polarConfig);
</script>
@endsection
