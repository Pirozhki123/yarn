<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\EquipmentRequest;

class EquipmentController extends Controller
{
    private $viewInfo = [
        'key' => 'equipment',
        'name' => '備品',
        'route' => '/equipment',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => Equipment::all()->toArray(),
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
    public function store(EquipmentRequest $request)
    {
        $viewItem = Equipment::create([
            'equipment_name' => $request['equipment_name'],
            'quantity' => $request['quantity'],
        ]);

        return redirect()->route('equipment.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = Equipment::find($id);
        return view('management.show', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
            'id' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $viewItem = Equipment::find($id);
        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EquipmentRequest $request, $id)
    {
        Equipment::where('id', $id)->update([
            'equipment_name' => $request->equipment_name,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('equipment.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Equipment::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return back();
    }

    public function confirm(Equipment $equipment)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
