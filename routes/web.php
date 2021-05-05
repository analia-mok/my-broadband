<?php

use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Customer-facing routes.
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', fn() => view('dashboard'))->name('dashboard');

    // Equipment Management - User Facing.
    Route::get('/my-equipment', [EquipmentController::class, 'index'])->name('equipment');

    Route::get('/my-data', fn() => view('data-usage.index'))->name('data-usage.index');
});

// Admin-only routes.
Route::group(['middleware' => ['auth:sanctum', 'verified'], 'prefix' => 'admin'], function () {
    Route::get('/', fn() => view('admin-dashboard'))->name('admin.dashboard');

    Route::get('/equipment', fn() => view('equipment.admin-index'))->name('equipment.admin');
    Route::get('/equipment/create', fn() => view('equipment.create'))->name('equipment.create');
});
