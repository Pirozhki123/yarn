<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function reports()
    {
        return $this->belongsToMany(Report::class);
    }
}
