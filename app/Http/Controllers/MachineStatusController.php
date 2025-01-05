<?php

namespace App\Http\Controllers;

use App\Models\MachineStatus;
use Illuminate\Http\Request;

class MachineStatusController extends Controller
{
    private  $viewInfo = [
        'key' => 'machine_status',
        'name' => '機械ステータス',
        'route' => '/machine_status',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => MachineStatus::all()->toArray(),
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
        $viewItem = MachineStatus::create([
            'machine_status' => $request['machine_status'],
        ]);

        return redirect()->route('machine_status.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = MachineStatus::find($id);
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
        $viewItem = MachineStatus::find($id);
        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $viewItem = MachineStatus::where('id', $id)->update([
            'machine_status' => $request->machine_status,
        ]);

        return redirect()->route('machine_status.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MachineStatus::destroy($id);

        return redirect()->route('machine_status.index');
    }

    public function confirm(Request $request, $id)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
