<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private  $viewInfo = [
        'key' => 'product',
        'name' => '製品',
        'route' => '/product',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => Product::all()->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.create', [
            'viewInfo' => $this->viewInfo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $viewItem = Product::create([
            'product_number' => $request->input('product_number'),
            'memo' => $request->input('memo'),
        ]);

        return redirect()->route('product.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = Product::with(['sizes', 'symbols'])->find($id);
        return view('management.show', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $viewItem = Product::with(['sizes', 'symbols'])->find($id);

        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
        ]);
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

        return redirect()->route('product.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return back();
    }

    public function confirm(ProductRequest $request, $id)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
