<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'total' => Kendaraan::count(),
            'aktif' => Kendaraan::where('status_pajak', 'AKTIF')->count(),
            'menunggak' => Kendaraan::where('status_pajak', 'MENUNGGAK')->count(),
            'jatuhTempo' => Kendaraan::whereDate(
                'tanggal_jatuh_tempo',
                '<=',
                now()->addDays(30)
            )->count(),
        ]);
    }
}
