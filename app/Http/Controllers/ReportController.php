<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Report;

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
            'report_types' => config('constants.report_types'),
            'products' => \App\Models\Product::all(),
            'equipment' => \App\Models\Equipment::all(),
            'machine_statuses' => \App\Models\MachineStatus::all()
        ];
        return view('management.create', [
            'viewInfo' => $this->viewInfo,
            'formInfo' => $formInfo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        // 保存処理
        $viewItem = Report::create([
            'user_id' => $request['user_id'],
            'machine_id' => $request['machine_id'],
            'report_type' => $request['report_type'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'report' => $request['report'],
        ]);
        if(isset($request['equipment_id'])) {
            $equipments = [];
            foreach($request['equipment_id'] as $key => $equipment_id) {
                $equipments[$equipment_id] = ['quantity' => $request['quantity'][$key]];
            }
            $viewItem->equipments()->attach($equipments);
        }
        // 機械情報更新
        $test = \App\Models\Machine::updateMachineFromReport($request);

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
            'report_types' => config('constants.report_types'),
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
    public function update(ReportRequest $request, $id)
    {
        $repost = Report::where('id', $id)->first();
        $repost->update([
            'user_id' => $request['user_id'],
            'machine_id' => $request['machine_id'],
            'report_type' => $request['report_type'],
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

    public function confirm(ReportRequest $request, $id)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
