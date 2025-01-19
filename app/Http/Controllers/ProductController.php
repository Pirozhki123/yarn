<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'product_number' => $request->input('product_number'),
            'memo' => $request->input('memo'),
        ]);

        return redirect()->route('product.show', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['sizes', 'symbols'])->find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with(['sizes', 'symbols'])->find($id);

        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, $id)
    {
        Product::where('id', $id)->update([
            'product_number' => $request->product_number,
            'memo' => $request->memo,
        ]);

        return redirect()->route('product.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return redirect()->route('product.show', $id);
    }
}
