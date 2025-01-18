<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\MachineStatus;
use App\Models\Product;
use App\Http\Requests\MachineRequest;

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
    public function store(MachineRequest $request)
    {
        $viewItem = Machine::create([
            'machine_status_id' => $request->input('machine_status_id'),
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $request->input('symbol_id'),
            'machine_name' => $request->input('machine_name'),
            'manufacture' => $request->input('manufacture'),
            'needle_count' => $request->input('needle_count'),
            'needle_type' => $request->input('needle_type'),
            'lane_number' => $request->input('lane_number'),
            'machine_number' => $request->input('machine_number'),
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
    public function update(MachineRequest $request, $id)
    {
        Machine::where('id', $id)->update([
            'machine_status_id' => $request->input('machine_status_id'),
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $request->input('symbol_id'),
            'machine_name' => $request->input('machine_name'),
            'manufacture' => $request->input('manufacture'),
            'needle_count' => $request->input('needle_count'),
            'needle_type' => $request->input('needle_type'),
            'lane_number' => $request->input('lane_number'),
            'machine_number' => $request->input('machine_number'),
        ]);

        return redirect()->route('machine.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Machine::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return back();
    }

    public function confirm(Machine $equipment)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }

    public function load_machine($id)
    {
        $result = Machine::find($id);

        return $result;
    }
}
