<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Machine extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('delete_flag', function(Builder $builder) {
            $builder->where('delete_flag', false);
        });
    }

    protected $guarded = ['id','created_at','updated_at'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function symbol()
    {
        return $this->belongsTo(Symbol::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    // 報告の内容で稼働状態を変更
    public static function updateMachineFromReport($request) {
        if($request->input('report_type') == 'switch' || $request->input('report_type') == 'repair' || $request->input('report_type') == 'symbol_change') {
            // 検査が必要な場合は検査。そうでなければ稼働
            $machine_status = $request->input('required_check') == true ? 'inspecting' : 'active';
        } elseif($request->input('report_type') == 'inspection') {
            // 検査結果がOKなら稼働。そうでなければ故障。
            $machine_status = $request->input('check_passed') == true ? 'active' : 'fault';
        } elseif($request->input('report_type') == 'malfunction') {
            // 故障停止ならば停止。そうでなければ稼働。
            $machine_status = $request->input('stop_machine') == true ? 'fault' : 'active';
        } elseif($request->input('report_type') == 'completed') {
            // 終了ならば終了
            $machine_status = 'completed';
        } else {
            $machine_status = Machine::where('id', $request->input('machine_id'))->pluck('machine_status')->first();
        }

        $result = Machine::where('id', $request->input('machine_id'))->update([
            'machine_status' => $machine_status,
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $request->input('symbol_id'),
        ]);

        return $result;
    }

    // Chart.jsの円グラフ用設定を作成
    public static function getPieChartConfig()
    {
        foreach(config('constants.machine_status') as $key => $value) {
            $labelItems[] = $value;
            $dataItems[] = Machine::where('machine_status', $key)->count();
            $backgroundColorItems[] = config('constants.machine_status_color')[$key];
        }
        $pieChartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $labelItems,
                'datasets' => [
                    [
                        'label' => '稼働状況',
                        'data' => $dataItems,
                        'backgroundColor' => $backgroundColorItems,
                    ]
                ]
            ]
        ];

        return $pieChartConfig;
    }

    // 稼働率を取得
    public static function getOperatingRate()
    {
        $laneNumbers = Machine::pluck('lane_number')->unique();
        if(empty($laneNumbers)) return;

        foreach($laneNumbers as $laneNumber) {
            $activeMachineCount = Machine::where('machine_status', 'active')->where('lane_number', $laneNumber)->count();
            $faultMachineCount = Machine::where('machine_status', 'fault')->where('lane_number', $laneNumber)->count();
            $operatingRate = round($activeMachineCount / ($activeMachineCount + $faultMachineCount) * 100);
            $operatingRates[$laneNumber] = [
                'operatingRate' => $operatingRate,
                'activeMachineCount' => $activeMachineCount,
                'faultMachineCount' => $faultMachineCount,
            ];
        }

        $activeMachineCountAll = Machine::where('machine_status', 'active')->count();
        $faultMachineCountAll = Machine::where('machine_status', 'fault')->count();
        $operatingRateAll = round($activeMachineCount / ($activeMachineCount + $faultMachineCount) * 100);
        $operatingRates['All'] = [
            'operatingRate' => $operatingRateAll,
            'activeMachineCount' => $activeMachineCountAll,
            'faultMachineCount' => $faultMachineCountAll,
        ];

        return $operatingRates;
    }
}
