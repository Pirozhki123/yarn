<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $guarded = ['id','created_at','updated_at'];

    public function product()
    {
        return $this->belogsTo(Product::class);
    }
}
