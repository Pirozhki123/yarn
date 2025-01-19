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
            $machine_status = \App\Models\Machine::where('id', $request->input('machine_id'))->pluck('machine_status')->first();
        }

        $result = Machine::where('id', $request->input('machine_id'))->update([
            'machine_status' => $machine_status,
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $request->input('symbol_id'),
        ]);

        return $result;
    }
}
