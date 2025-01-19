<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Models\Product;
use App\Http\Requests\MachineRequest;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::with('product', 'size', 'symbol')->get();
        return view('machine.index', compact('machines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $machine_statuses = config('constants.machine_status');
        $products = Product::all();

        return view('machine.create', compact('machine_statuses', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MachineRequest $request)
    {
        $machine = Machine::create([
            'machine_status' => $request->input('machine_status'),
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

        return redirect()->route('machine.show', $machine->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $machine = Machine::find($id);
        return view('machine.show', compact('machine'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $machine_statuses = config('constants.machine_status');
        $products = Product::all();
        $machine = Machine::with(['product',])->find($id);

        return view('machine.edit',
            compact(
                'machine_statuses',
                'products',
                'machine'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MachineRequest $request, $id)
    {
        Machine::where('id', $id)->update([
            'machine_status' => $request->input('machine_status'),
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

        return redirect()->route('machine.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Machine::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return redirect()->route('machine.index');
    }

    public function load_machine($id)
    {
        $result = Machine::find($id);

        return $result;
    }
}
