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
}
