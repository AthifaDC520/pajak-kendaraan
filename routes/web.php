<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('login');
});

// form login
Route::get('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest'); //otomatis dashboard tdk bs balik login

// proses login 
Route::post('/login', [AuthController::class, 'authenticate']);

// logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {

    // DASHBOARD
    Route::get('/dashboard', fn () => view('dashboard.index'))
        ->name('dashboard');

    // KENDARAAN
    Route::get('/kendaraan', [KendaraanController::class, 'index']); // list

    Route::get('/kendaraan/cari', [KendaraanController::class, 'cariForm']); // form cari
    Route::post('/kendaraan/cari', [KendaraanController::class, 'cari']);   // hasil cari

    Route::get('/kendaraan/tambah', [KendaraanController::class, 'create']);
    Route::post('/kendaraan/tambah', [KendaraanController::class, 'store']);

    Route::get('/kendaraan/{id}/edit', [KendaraanController::class, 'edit']);
    Route::put('/kendaraan/{id}', [KendaraanController::class, 'update']);

    Route::post('/kendaraan/{id}/hapus', [KendaraanController::class, 'destroy']);
});
