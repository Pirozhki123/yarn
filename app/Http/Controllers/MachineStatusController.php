<?php

namespace App\Http\Controllers;

use App\Models\MachineStatus;
use Illuminate\Http\Request;

class MachineStatusController extends Controller
{
    private $resourceName = '機械ステータス';
    private $routePath = '/machine/status';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('management.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('management.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MachineStatus $machineStatus)
    {
        return view('management.show', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MachineStatus $machineStatus)
    {
        return view('management.edit', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MachineStatus $machineStatus)
    {
        return view('management.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MachineStatus $machineStatus)
    {
        return view('management.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    public function confirm(MachineStatus $equipment)
    {
        return view('management.confirm', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }
}
