<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportRequest;
use App\Models\User;
use App\Models\Machine;
use App\Models\Product;
use App\Models\Equipment;
use App\Models\Report;
use App\Models\Symbol;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with(
            'user',
            'machine',
            'size',
            'symbol',
        )->orderBy('created_at', 'desc')->get();
        return view('report.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $machines = Machine::all();
        $report_types = config('constants.report_types');
        $products = Product::all();
        $equipment = Equipment::all();
        $machine_statuses = config('constants.machine_status');

        return view('report.create', compact(
            'users',
            'machines',
            'report_types',
            'products',
            'equipment',
            'machine_statuses',
        ));
    }

    public function create_malfunction()
    {
        $user = Auth::user();
        $machines = Machine::whereIn('machine_status', [
            'active',
        ])->get();
        $equipment = Equipment::all();
        $report_type = 'malfunction';

        return view("report.create", compact(
            'user',
            'machines',
            'equipment',
            'report_type',
        ));
    }

    public function create_completed()
    {
        $user = Auth::user();
        $machines = Machine::whereIn('machine_status', [
            'active',
            'fault',
        ])->get();
        $equipment = Equipment::all();
        $report_type = 'completed';

        return view("report.create", compact(
            'user',
            'machines',
            'equipment',
            'report_type',
        ));
    }

    public function create_switch()
    {
        $user = Auth::user();
        $machines = Machine::whereIn('machine_status', [
            'fault',
            'completed',
        ])->get();
        $products = Product::all();
        $equipment = Equipment::all();
        $report_type = 'switch';

        return view("report.create", compact(
            'user',
            'machines',
            'products',
            'equipment',
            'report_type',
        ));
    }

    public function create_repair()
    {
        $user = Auth::user();
        $machines = Machine::whereIn('machine_status', [
            'fault',
        ])->get();
        $equipment = Equipment::all();
        $report_type = 'repair';

        return view("report.create", compact(
            'user',
            'machines',
            'equipment',
            'report_type',
        ));
    }

    public function create_inspection()
    {
        $user = Auth::user();
        $machines = Machine::whereIn('machine_status', [
            'inspecting',
        ])->get();
        $equipment = Equipment::all();
        $report_type = 'inspection';

        return view("report.create", compact(
            'user',
            'machines',
            'equipment',
            'report_type',
        ));
    }

    public function create_symbol_change()
    {
        $user = Auth::user();
        $machines = Machine::whereIn('machine_status', [
            'active',
            'fault',
        ])->get();
        $equipment = Equipment::all();
        $report_type = 'symbol_change';

        return view("report.create", compact(
            'user',
            'machines',
            'equipment',
            'report_type',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        // 報告保存処理
        $report = Report::create([
            'user_id' => $request->input('user_id'),
            'machine_id' => $request->input('machine_id'),
            'report_type' => $request->input('report_type'),
            'product_id' => $request->input('product_id'),
            'size_id' => $request->input('size_id'),
            'symbol_id' => $request->input('symbol_id'),
            'report' => $request->input('report'),
        ]);
        // 機械情報更新
        Machine::updateMachineFromReport($request);
        // 備品交換保存処理
        if($request->has('equipment_id')) {
            $equipment = [];
            foreach($request->input('equipment_id') as $key => $equipment_id) {
                $equipment[$equipment_id] = ['quantity' => $request->input('quantity')[$key]];
            }
            $report->equipment()->attach($equipment);
        }

        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report = Report::with(
            'user',
            'machine',
            'size',
            'symbol',
        )->where('id', $id)->first();

        return view('report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $users = User::all();
        $machines = Machine::all();
        $report_types = config('constants.report_types');
        $products = Product::all();
        $equipment = Equipment::all();
        $report = Report::with('equipment')->find($id);

        return view('report.edit', compact(
            'users',
            'machines',
            'report_types',
            'products',
            'equipment',
            'report',
        ));
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
            $equipment = [];
            foreach($request->input('equipment_id') as $key => $equipment_id) {
                $equipment[$equipment_id] = ['quantity' => $request->input('quantity')[$key]];
            }
            $repost->equipment()->sync($equipment);
        }

        return redirect()->route('report.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Report::where('id', $id)->update([
            'delete_flag' => true,
        ]);

        return redirect()->route('report.index');
    }
}
