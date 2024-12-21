<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $resourceName = '製品';
    private $routePath = '/product';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('product.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        return view('product.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return view('product.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    public function confirm(Product $equipment)
    {
        return view('product.confirm', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }
}
