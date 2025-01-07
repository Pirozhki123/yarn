<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    private $viewInfo = [
        'key' => 'machine',
        'name' => '機械',
        'route' => '/machine',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => Machine::all()->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewItemRelations = [
            'machine_status' => [
                'key' => 'machine_status',
                'column' => 'machine_status',
                'name' => '稼働状況',
                'values' => \App\Models\MachineStatus::all(),
            ],
            'product' => [
                'key' => 'product',
                'column' => 'product_number',
                'name' => '品番',
                'values' => \App\Models\Product::all(),
            ],
            'size' => [
                'key' => 'size',
                'column' => 'size',
                'name' => 'サイズ',
                'values' => \App\Models\Size::all(),
            ],
            'symbol' => [
                'key' => 'symbol',
                'column' => 'symbol',
                'name' => '識別記号',
                'values' => \App\Models\Symbol::all(),
            ]
        ];
        return view('management.create', [
            'viewInfo' => $this->viewInfo,
            'viewItemRelations' => $viewItemRelations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $viewItem = Machine::create([
            'machine_status_id' => $request['machine_status_id'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'machine_name' => $request['machine_name'],
            'manufacture' => $request['manufacture'],
            'needle_count' => $request['needle_count'],
            'needle_type' => $request['needle_type'],
            'lane_number' => $request['lane_number'],
            'machine_number' => $request['machine_number'],
        ]);

        return redirect()->route('machine.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = Machine::find($id);
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
        $viewItem = Machine::find($id);
        $viewItemRelations = [
            'machine_status' => [
                'key' => 'machine_status',
                'column' => 'machine_status',
                'name' => '稼働状況',
                'values' => \App\Models\MachineStatus::all(),
            ],
            'product' => [
                'key' => 'product',
                'column' => 'product_number',
                'name' => '品番',
                'values' => \App\Models\Product::all(),
            ],
            'size' => [
                'key' => 'size',
                'column' => 'size',
                'name' => 'サイズ',
                'values' => \App\Models\Size::all(),
            ],
            'symbol' => [
                'key' => 'symbol',
                'column' => 'symbol',
                'name' => '識別記号',
                'values' => \App\Models\Symbol::all(),
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
        $viewItem = Machine::where('id', $id)->update([
            'machine_status_id' => $request['machine_status_id'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'machine_name' => $request['machine_name'],
            'manufacture' => $request['manufacture'],
            'needle_count' => $request['needle_count'],
            'needle_type' => $request['needle_type'],
            'lane_number' => $request['lane_number'],
            'machine_number' => $request['machine_number'],
        ]);

        return redirect()->route('machine.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Machine::destroy($id);

        return redirect()->route('machine.index');
    }

    public function confirm(Machine $equipment)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
