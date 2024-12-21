<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineStatusController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReportTypeController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
Route::get('/equipment/show', [EquipmentController::class, 'show'])->name('equipment.show');
Route::get('/equipment/create', [EquipmentController::class, 'create'])->name('equipment.create');
Route::get('/equipment/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
Route::get('/equipment/confirm', [EquipmentController::class, 'confirm'])->name('equipment.confirm');

Route::get('/machine', [MachineController::class, 'index'])->name('machine.index');
Route::get('/machine/show', [MachineController::class, 'show'])->name('machine.show');
Route::get('/machine/create', [MachineController::class, 'create'])->name('machine.create');
Route::get('/machine/edit', [MachineController::class, 'edit'])->name('machine.edit');
Route::get('/machine/confirm', [MachineController::class, 'confirm'])->name('machine.confirm');

Route::get('/machine/status', [MachineStatusController::class, 'index'])->name('machine_status.index');
Route::get('/machine/status/show', [MachineStatusController::class, 'show'])->name('machine_status.show');
Route::get('/machine/status/create', [MachineStatusController::class, 'create'])->name('machine_status.create');
Route::get('/machine/status/edit', [MachineStatusController::class, 'edit'])->name('machine_status.edit');
Route::get('/machine/status/confirm', [MachineStatusController::class, 'confirm'])->name('machine_status.confirm');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/show', [ProductController::class, 'show'])->name('product.show');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::get('/product/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::get('/product/confirm', [ProductController::class, 'confirm'])->name('product.confirm');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/show', [ReportController::class, 'show'])->name('report.show');
Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
Route::get('/report/edit', [ReportController::class, 'edit'])->name('report.edit');
Route::get('/report/confirm', [ReportController::class, 'confirm'])->name('report.confirm');

Route::get('/report/type', [ReportTypeController::class, 'index'])->name('report_type.index');
Route::get('/report/type/show', [ReportTypeController::class, 'show'])->name('report_type.show');
Route::get('/report/type/create', [ReportTypeController::class, 'create'])->name('report_type.create');
Route::get('/report/type/edit', [ReportTypeController::class, 'edit'])->name('report_type.edit');
Route::get('/report/type/confirm', [ReportTypeController::class, 'confirm'])->name('report_type.confirm');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/show', [UserController::class, 'show'])->name('user.show');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::get('/user/confirm', [UserController::class, 'confirm'])->name('user.confirm');
