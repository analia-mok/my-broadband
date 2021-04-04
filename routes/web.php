<?php

use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');


    // Admin/Support Specialist Admin Dashboard.
    // @todo restrict to those with the support permission.
    Route::get('/admin', function () {
        return view('admin-dashboard');
    })->name('admin.dashboard');
});

// Equipment Management.
Route::get('/my-equipment', [EquipmentController::class, 'index'])->name('equipment');
Route::get('/admin/equipment/add', [EquipmentController::class, 'create'])->name('equipment.add');
