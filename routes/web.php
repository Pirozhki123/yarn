<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SymbolController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('/equipment/show/{id}', [EquipmentController::class, 'show'])->name('equipment.show');
    Route::get('/equipment/create', [EquipmentController::class, 'create'])->name('equipment.create');
    Route::post('/equipment/create', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/equipment/edit/{id}', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('/equipment/edit/{id}', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/equipment/destroy/{id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
    Route::get('/equipment/confirm/{id}', [EquipmentController::class, 'confirm'])->name('equipment.confirm');
    Route::get('/equipment/load_equipment',[EquipmentController::class, 'load_equipment'])->name('equipment.load_equipment');

    Route::get('/machine', [MachineController::class, 'index'])->name('machine.index');
    Route::get('/machine/show/{id}', [MachineController::class, 'show'])->name('machine.show');
    Route::get('/machine/create', [MachineController::class, 'create'])->name('machine.create');
    Route::post('/machine/create', [MachineController::class, 'store'])->name('machine.store');
    Route::get('/machine/edit/{id}', [MachineController::class, 'edit'])->name('machine.edit');
    Route::put('/machine/edit/{id}', [MachineController::class, 'update'])->name('machine.update');
    Route::delete('/machine/destroy/{id}', [MachineController::class, 'destroy'])->name('machine.destroy');
    Route::get('/machine/confirm/{id}', [MachineController::class, 'confirm'])->name('machine.confirm');
    Route::get('/machine/load_machine/{id}', [MachineController::class, 'load_machine'])->name('machine.load_machine');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/confirm/{id}', [ProductController::class, 'confirm'])->name('product.confirm');

    Route::get('/size/{id}', [SizeController::class, 'index'])->name('size.index');
    Route::post('/size/store/{id}', [SizeController::class, 'store'])->name('size.store');
    Route::delete('/size/destroy/{id}', [SizeController::class, 'destroy'])->name('size.destroy');

    Route::get('/symbol/{id}', [SymbolController::class, 'index'])->name('symbol.index');
    Route::post('/symbol/store/{id}', [SymbolController::class, 'store'])->name('symbol.store');
    Route::delete('/symbol/destroy/{id}', [SymbolController::class, 'destroy'])->name('symbol.destroy');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/show', [ReportController::class, 'show'])->name('report.show');
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
    Route::get('/report/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::get('/report/confirm', [ReportController::class, 'confirm'])->name('report.confirm');
    foreach(config('constants.report_types') as $key => $value) {
        Route::get('/report/create/' . $key, [ReportController::class, 'create_' . $key])->name('report.create.' . $key);
    }

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/show/{id}', [ReportController::class, 'show'])->name('report.show');
    Route::get('/report/create', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report/create', [ReportController::class, 'store'])->name('report.store');
    Route::get('/report/edit/{id}', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/edit/{id}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/report/destroy/{id}', [ReportController::class, 'destroy'])->name('report.destroy');
    Route::get('/report/confirm/{id}', [ReportController::class, 'confirm'])->name('report.confirm');

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/confirm/{id}', [UserController::class, 'confirm'])->name('user.confirm');
});





