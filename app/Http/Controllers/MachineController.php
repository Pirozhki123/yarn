<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    private $resourceName = '機械';
    private $routePath = '/machine';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('machine.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('machine.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('machine.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Machine $machine)
    {
        return view('machine.show', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        return view('machine.edit', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machine)
    {
        return view('machine.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        return view('machine.index', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }

    public function confirm(Machine $equipment)
    {
        return view('machine.confirm', [
            'resourceName' => $this->resourceName,
            'routePath' => $this->routePath,
        ]);
    }
}
