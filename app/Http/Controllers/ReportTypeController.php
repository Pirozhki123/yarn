<?php

namespace App\Http\Controllers;

use App\Models\ReportType;
use Illuminate\Http\Request;

class ReportTypeController extends Controller
{
    private  $viewInfo = [
        'key' => 'report_type',
        'name' => '報告種',
        'route' => '/report_type',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => ReportType::all()->toArray(),
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
        $viewItem = ReportType::create([
            'report_type' => $request['report_type'],
            'quantity' => $request['quantity'],
        ]);

        return redirect()->route('report_type.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = ReportType::find($id);
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
        $viewItem = ReportType::find($id);
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
        $viewItem = ReportType::where('id', $id)->update([
            'report_type' => $request->report_type,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('report_type.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ReportType::destroy($id);

        return redirect()->route('report_type.index');
    }

    public function confirm(ReportType $report_type)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
