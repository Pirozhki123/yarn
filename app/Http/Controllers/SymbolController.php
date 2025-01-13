<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Symbol;
use App\Models\Product;

class SymbolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        $result = Symbol::where('product_id', $product_id)->orderBy('id', 'asc')->get();

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        Product::where('id', $id)->first()->symbols()->updateOrCreate(
            ['symbol' => $request->symbol],
            ['delete_flag' => false]
        );

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Symbol::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return back();
    }
}
