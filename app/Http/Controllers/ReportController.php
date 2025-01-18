<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\User;
use App\Models\Machine;
use App\Models\Product;
use App\Models\Equipment;
use App\Models\MachineStatus;
use App\Models\Report;
use App\Models\Symbol;

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
            'users' => User::all(),
            'machines' => Machine::all(),
            'report_types' => config('constants.report_types'),
            'products' => Product::all(),
            'equipment' => Equipment::all(),
            'machine_statuses' => MachineStatus::all()
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
        // 新規記号登録処理
        $symbolId = Symbol::createSymbolFromReport($request);
        // 報告保存処理
        $viewItem = Report::create([
            'user_id' => $request->input('user_id'),
            'machine_id' => $request->input('machine_id'),
            'report_type' => $request->input('report_type'),
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $symbolId,
            'report' => $request->input('report'),
        ]);
        // 備品交換保存処理
        if($request->has('equipment_id')) {
            $equipments = [];
            foreach($request->input('equipment_id') as $key => $equipment_id) {
                $equipments[$equipment_id] = ['quantity' => $request->input('quantity')][$key];
            }
            $viewItem->equipments()->attach($equipments);
        }
        // 機械情報更新
        Machine::updateMachineFromReport($request);

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
            'users' => User::all(),
            'machines' => Machine::all(),
            'report_types' => config('constants.report_types'),
            'products' => Product::all(),
            'equipment' => Equipment::all(),
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
        // 記号新規登録処理
        $symbolId = Symbol::createSymbolFromReport($request);
        // 報告保存処理
        $repost = Report::where('id', $id)->first();
        $repost->update([
            'user_id' => $request->input('user_id'),
            'machine_id' => $request->input('machine_id'),
            'report_type' => $request->input('report_type'),
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $symbolId,
            'report' => $request->input('report'),
        ]);
        // 備品交換保存処理
        if($request->has('equipment_id')) {
            $equipments = [];
            foreach($request->input('equipment_id') as $key => $equipment_id) {
                $equipments[$equipment_id] = ['quantity' => $request->input('quantity')[$key]];
            }
            $repost->equipments()->sync($equipments);
        }

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
