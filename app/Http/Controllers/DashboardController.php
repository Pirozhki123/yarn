<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index() {
        foreach(config('constants.machine_status') as $key => $value) {
            $label_items[] = $value;
            $data_items[] = \App\Models\Machine::where('machine_status', $key)->count();
        }
        $data = [
            'labels' => $label_items,
            'data' => $data_items,
        ];

        return view('dashboard', compact('data'));
    }
}
