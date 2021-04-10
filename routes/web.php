<?php

use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');

    // Equipment Management - User Facing.
    Route::get('/my-equipment', [EquipmentController::class, 'index'])->name('equipment');
});


Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/', fn() => view('admin-dashboard'))->name('admin.dashboard');

    Route::get('/equipment', fn() => view('equipment.admin-index'))->name('equipment.admin');
    Route::get('/equipment/add', [EquipmentController::class, 'create'])->name('equipment.add');
});
