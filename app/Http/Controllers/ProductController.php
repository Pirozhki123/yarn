<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Size;
use App\Models\Symbol;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $viewItem = Product::create([
            'product_number' => $request['product_number'],
            'memo' => $request['memo'],
        ]);

        return redirect()->route('product.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = Product::find($id);
        $viewItemRelations = [
            'size' => [
                'key' => 'size',
                'name' => 'サイズ',
                'values' => $viewItem->sizes()->get()->toArray(),
            ],
            'symbol' => [
                'key' => 'symbol',
                'name' => '識別記号',
                'values' => $viewItem->symbols()->get()->toArray(),
            ]
        ];
        return view('management.show', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
            'viewItemRelations' => $viewItemRelations,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $viewItem = Product::with(['sizes', 'symbols'])->find($id);
        $viewItemRelations = [
            'size' => [
                'key' => 'size',
                'name' => 'サイズ',
                'values' => $viewItem->sizes()->get()->toArray(),
            ],
            'symbol' => [
                'key' => 'symbol',
                'name' => '識別記号',
                'values' => $viewItem->symbols()->get()->toArray(),
            ]
        ];
        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
            'viewItemRelations' => $viewItemRelations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $viewItem = Product::where('id', $id)->update([
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
        Product::destroy($id);

        return redirect()->route('product.index');
    }

    public function confirm(Request $request, $id)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }

    public function sizeStore(Request $request, $id)
    {
        $productItem = Product::where('id', $id)->first();
        $productItem->sizes()->create([
            'size' => $request->size,
        ]);

        return redirect()->route('product.show', [
            'id' => $id,
        ]);
    }

    public function symbolStore(Request $request, $id)
    {
        $productItem = Product::where('id', $id)->first();
        $productItem->symbols()->create([
            'symbol' => $request->symbol,
        ]);

        return redirect()->route('product.show', [
            'id' => $id,
        ]);
    }

    public function sizeDestroy($id)
    {
        $productId = Size::where('id', $id)->first()->product_id;
        Size::destroy($id);

        return redirect()->route('product.show', [
            'id' => $productId,
        ]);
    }

    public function symbolDestroy($id)
    {
        $productId = Symbol::where('id', $id)->first()->product_id;
        Symbol::destroy($id);

        return redirect()->route('product.show', [
            'id' => $productId,
        ]);
    }
}
