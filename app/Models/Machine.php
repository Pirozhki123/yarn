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

    public function machine_status()
    {
        return $this->belongsTo(MachineStatus::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public static function updateMachineFromReport($request) {
        $machine_status_id = [];
        if($request->input('report_type') == 'switch' || $request->input('report_type') == 'repair' || $request->input('report_type') == 'symbol_change') {
            // 検査が必要な場合は検査。そうでなければ稼働
            $machine_status_id = $request->input('required_check') == true ? 5 : 1;
        } elseif($request->input('report_type') == 'inspection') {
            // 検査結果がOKなら稼働。そうでなければ故障。
            $machine_status_id = $request->input('check_passed') == true ? 1 : 2;
        } elseif($request->input('report_type') == 'malfunction') {
            // 故障停止ならば停止。そうでなければ稼働。
            $machine_status_id = $request->input('stop_machine') == true ? 2 : 1;
        } elseif($request->input('report_type') == 'counter_end') {
            // 終了ならば終了
            $machine_status_id = 3;
        } else {
            $machine_status_id = \App\Models\Machine::where('id', $request->input('machine_id'))->pluck('machine_status_id')->first();
        }

        $result = Machine::where('id', $request->input('machine_id'))->update([
            'machine_status_id' => $machine_status_id,
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $request->input('symbol_id'),
        ]);

        return $result;
    }
}
