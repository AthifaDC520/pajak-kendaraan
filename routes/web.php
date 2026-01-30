<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| AKSES UMUM (TANPA LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/kendaraan', [KendaraanController::class, 'index']); // ✅ LIST BOLEH DIAKSES UMUM
Route::get('/kendaraan/cari', [KendaraanController::class, 'cariForm']);
Route::post('/kendaraan/cari', [KendaraanController::class, 'cari']);

/*
|--------------------------------------------------------------------------
| AKSES ADMIN (HARUS LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/kendaraan/tambah', [KendaraanController::class, 'create']);
    Route::post('/kendaraan/tambah', [KendaraanController::class, 'store']);

    Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit']);
    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update']);

    Route::post('/kendaraan/{id}/hapus', [KendaraanController::class, 'destroy']);
});
