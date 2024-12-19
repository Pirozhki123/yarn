<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\EquipmentController;
use app\Http\Controllers\MachineController;
use app\Http\Controllers\MachineStatusController;
use app\Http\Controllers\ProductController;
use app\Http\Controllers\ReportController;
use app\Http\Controllers\ReportTypeController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
