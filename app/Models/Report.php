<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function report_type()
    {
        return $this->belongsTo(ReportType::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class ,'report_equipment');
    }
}
