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
        $viewItemRelations = [
            'user' => [
                'key' => 'user',
                'column' => 'name',
                'name' => '報告者',
                'values' => \App\Models\User::all(),
            ],
            'machine' => [
                'key' => 'machine',
                'column' => 'machine_number',
                'name' => '機械',
                'values' => \App\Models\Machine::all(),
            ],
            'report_type' => [
                'key' => 'report_type',
                'column' => 'report_type',
                'name' => '報告種',
                'values' => \App\Models\ReportType::all(),
            ],
            'product' => [
                'key' => 'product',
                'column' => 'product_number',
                'name' => '品番',
                'values' => \App\Models\Product::all(),
            ],
            'size' => [
                'key' => 'size',
                'column' => 'size',
                'name' => 'サイズ',
                'values' => \App\Models\Size::all(),
            ],
            'symbol' => [
                'key' => 'symbol',
                'column' => 'symbol',
                'name' => '識別記号',
                'values' => \App\Models\Symbol::all(),
            ],
            'equipment' => [
                'key' => 'equipment',
                'column' => 'equipment_name',
                'name' => '備品',
                'values' => \App\Models\Equipment::all(),
            ]
        ];
        return view('management.create', [
            'viewInfo' => $this->viewInfo,
            'viewItemRelations' => $viewItemRelations,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // TODO:productに関連づいたsize, symbolのみ登録できるようにする
        $viewItem = Report::create([
            'user_id' => $request['user_id'],
            'machine_id' => $request['machine_id'],
            'report_type_id' => $request['report_type_id'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'report' => $request['report'],
        ]);

        $viewItem->equipments()->attach([
            $request['equipment_id'] => [
                'quantity' => $request['quantity'],
            ]
        ]);

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
        $viewItem = Report::with(['equipments'])->find($id);
        $viewItemRelations = [
            'user' => [
                'key' => 'user',
                'column' => 'name',
                'name' => '報告者',
                'values' => \App\Models\User::all(),
            ],
            'machine' => [
                'key' => 'machine',
                'column' => 'machine_number',
                'name' => '機械',
                'values' => \App\Models\Machine::all(),
            ],
            'report_type' => [
                'key' => 'report_type',
                'column' => 'report_type',
                'name' => '報告種',
                'values' => \App\Models\ReportType::all(),
            ],
            'product' => [
                'key' => 'product',
                'column' => 'product_number',
                'name' => '品番',
                'values' => \App\Models\Product::all(),
            ],
            'size' => [
                'key' => 'size',
                'column' => 'size',
                'name' => 'サイズ',
                'values' => \App\Models\Size::all(),
            ],
            'symbol' => [
                'key' => 'symbol',
                'column' => 'symbol',
                'name' => '識別記号',
                'values' => \App\Models\Symbol::all(),
            ],
            'equipment' => [
                'key' => 'equipment',
                'column' => 'equipment_name',
                'name' => '備品',
                'values' => \App\Models\Equipment::all(),
            ]
        ];
        return view('management.edit', [
            'viewInfo' => $this->viewInfo,
            'viewItem' => $viewItem,
            'viewItemRelations' => $viewItemRelations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $test = Report::where('id', $id)->first();
        // $viewItem = Report::where('id', $id)->update([
        $test->update([
            'user_id' => $request['user_id'],
            'machine_id' => $request['machine_id'],
            'report_type_id' => $request['report_type_id'],
            'product_id' => $request['product_id'],
            'size_id' => $request['size_id'],
            'symbol_id' => $request['symbol_id'],
            'report' => $request['report'],
        ]);

        $test->equipments()->sync([
            $request['equipment_id'] =>
            ['quantity' => $request['quantity']]
        ]);

        return redirect()->route('report.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Report::destroy($id);

        return redirect()->route('report.index');
    }

    public function confirm(Report $equipment)
    {
        return view('management.confirm', [
            'viewInfo' => $this->viewInfo,
        ]);
    }
}
