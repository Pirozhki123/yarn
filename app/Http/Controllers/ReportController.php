<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $viewInfo = [
        'key' => 'report',
        'name' => '報告',
        'route' => '/report',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('management.index', [
            'viewInfo' => $this->viewInfo,
            'viewItems' => Report::all()->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formInfo = [
            'users' => \App\Models\User::all(),
            'machines' => \App\Models\Machine::all(),
            'report_types' => \App\Models\ReportType::all(),
            'products' => \App\Models\Product::all(),
            'equipment' => \App\Models\Equipment::all(),
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
        $viewItem = Report::create([
            'user_id' => $request['user_id'],
            'machine_id' => $request['machine_id'],
            'report_type_id' => $request['report_type_id'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'report' => $request['report'],
        ]);
        $equipments = [];
        foreach($request['equipment_id'] as $key => $equipment_id) {
            $equipments[$equipment_id] = ['quantity' => $request['quantity'][$key]];
        }
        $viewItem->equipments()->attach($equipments);

        return redirect()->route('report.show', ['id' => $viewItem['id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $viewItem = Report::find($id);
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
        $formInfo = [
            'users' => \App\Models\User::all(),
            'machines' => \App\Models\Machine::all(),
            'report_types' => \App\Models\ReportType::all(),
            'products' => \App\Models\Product::all(),
            'equipment' => \App\Models\Equipment::all(),
        ];
        $viewItem = Report::with(['equipments'])->find($id);
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
        $repost = Report::where('id', $id)->first();
        $repost->update([
            'user_id' => $request['user_id'],
            'machine_id' => $request['machine_id'],
            'report_type_id' => $request['report_type_id'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'report' => $request['report'],
        ]);

        $equipments = [];
        foreach($request['equipment_id'] as $key => $equipment_id) {
            $equipments[$equipment_id] = ['quantity' => $request['quantity'][$key]];
        }
        $repost->equipments()->sync($equipments);

        return redirect()->route('report.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Report::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return back();
    }

    public function confirm(Report $equipment)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
