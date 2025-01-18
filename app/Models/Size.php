<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Size extends Model
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
        return $this->belogsTo(Product::class);
    }

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
