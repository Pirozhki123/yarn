<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineStatus;
use App\Models\Product;
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
        $formInfo = [
            'machine_statuses' => MachineStatus::all(),
            'products' => Product::all(),
        ];

        return view('management.create', [
            'viewInfo' => $this->viewInfo,
            'formInfo' => $formInfo,
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
            'size_id' => 1, // FIXME:
            'symbol_id' => 1, // FIXME:
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
        $formInfo = [
            'machine_statuses' => MachineStatus::all(),
            'products' => Product::all(),
        ];
        $viewItem = Machine::with([
            'machine_status',
            'product',
        ])->find($id);

        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'formInfo' => $formInfo,
            'viewItem' => $viewItem,
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
            'size_id' => 1, // FIXME:
            'symbol_id' => 1, // FIXME:
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
