<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
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
        if($request['report_type'] == 'switch' || $request['report_type'] == 'repair' || $request['report_type'] == 'symbol_change') {
            // 検査が必要な場合は検査。そうでなければ稼働
            $machine_status_id = $request['required_check'] == true ? 5 : 1;
        } elseif($request['report_type'] == 'inspection') {
            // 検査結果がOKなら稼働。そうでなければ故障。
            $machine_status_id = $request['check_passed'] == true ? 1 : 2;
        } elseif($request['report_type'] == 'malfunction') {
            // 故障停止ならば停止。そうでなければ稼働。
            $machine_status_id = $request['stop_machine'] == true ? 2 : 1;
        } elseif($request['report_type'] == 'counter_end') {
            // 終了ならば終了
            $machine_status_id = 3;
        } else {
            $machine_status_id = \App\Models\Machine::where('id', $request['machine_id'])->pluck('machine_status_id')->first();
        }

        $result = Machine::where('id', $request['machine_id'])->update([
            'machine_status_id' => $machine_status_id,
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
        ]);

        return $result;
    }
}
