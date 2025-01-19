<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\EquipmentRequest;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipments = Equipment::all();

        return view('equipment.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('equipment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EquipmentRequest $request)
    {
        $equipment = Equipment::create([
            'equipment_name' => $request->input('equipment_name'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('equipment.show', $equipment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipment = Equipment::find($id);
        return view('equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $equipment = Equipment::find($id);
        return view('equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentRequest $request, $id)
    {
        Equipment::where('id', $id)->update([
            'equipment_name' => $request->input('equipment_name'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('equipment.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Equipment::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return redirect()->route('equipment.index');
    }

    public function load_equipment()
    {
        $equipment = Equipment::all();

        return view('report.partials.report_equipment', compact('equipment'));
    }
}
