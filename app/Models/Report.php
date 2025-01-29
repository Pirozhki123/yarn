<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Report extends Model
{
    protected static function booted()
    {
        static::addGlobalScope('delete_flag', function(Builder $builder) {
            $builder->where('delete_flag', false);
        });
    }

    protected $guarded = ['id','created_at','updated_at'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class ,'report_equipment')->withPivot('quantity');
    }

    public static function getLatestReportsData()
    {
        $reports = Report::with(['machine', 'user', 'product', 'size', 'symbol', 'equipment'])->latest()->take(20)->get();
        foreach($reports as $report) {
            $latestReportsData[] = [
                'report_type' => config('constants.report_types.' . $report->report_type),
                'machine_number' => $report->machine->lane_number . '-' . $report->machine->lane_number,
                'product_number' => $report->product->product_number,
                'size' => $report->size->size,
                'symbol' => $report->symbol->symbol,
                'report' => $report->report,
            ];
        }

        return $latestReportsData;
    }
}
