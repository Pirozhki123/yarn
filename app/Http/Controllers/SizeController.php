<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Models\Size;
use App\Models\Product;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        $result = Size::where('product_id', $product_id)->orderBy('id', 'asc')->get();

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
    public function store(SizeRequest $request, $id)
    {
        Product::where('id', $id)->first()->sizes()->updateOrCreate(
            ['size' => $request->size],
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
    public function update(SizeRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Size::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return back();
    }
}
