<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public function symbols()
    {
        return $this->hasMany(Symbol::class);
    }
}
