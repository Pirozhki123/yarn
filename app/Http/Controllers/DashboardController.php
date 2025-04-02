<?php

namespace App\Http\Controllers;
use App\Models\Machine;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index() {
        $polarConfig = Machine::getPieChartConfig();
        $operatingRates = Machine::getOperatingRate();
        $latestReportsData = Report::getLatestReportsData();

        return view('dashboard', compact(
            'polarConfig',
            'operatingRates',
            'latestReportsData'
        ));
    }
}
