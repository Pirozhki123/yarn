<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Symbol extends Model
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

    public static function createSymbolFromReport($request)
    {
        if ($request->input('symbol_type') === 'existing') {
            $symbolId = $request->input('symbol_id');
        } elseif($request->input('symbol_type') === 'new') {
            $createdSymbol = \App\Models\Symbol::create([
                'product_id' => $request->input('product_id'),
                'symbol' => $request->input('symbol'),
            ]);
            $symbolId = $createdSymbol->id;
        }

        return $symbolId;
    }
}
