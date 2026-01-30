<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();
        return view('kendaraan.list', compact('kendaraans'));
    }

    public function cariForm()
    {
        return view('kendaraan.cari');
    }
    
    public function cari(Request $request)
{
    $query = Kendaraan::query();

    // 🔎 Cari plat (partial)
    if ($request->filled('nomor_plat')) {
        $plat = strtoupper($request->nomor_plat);
        $query->where('nomor_plat', 'LIKE', "%$plat%");
    }

    // 🏢 Filter DINAS / OPD
    if ($request->filled('dinas_opd')) {
        $query->where('dinas_opd', $request->dinas_opd);
    }

    // 📅 Filter Tahun Kendaraan
    if ($request->filled('tahun_kendaraan')) {
        $query->where('tahun_kendaraan', $request->tahun_kendaraan);
    }

    // 💰 Filter Status Pajak
    if ($request->filled('status_pajak')) {
        $query->where('status_pajak', $request->status_pajak);
    }

    // 🔃 Sorting
    if ($request->filled('sort')) {
        match ($request->sort) {
            'tahun_asc'  => $query->orderBy('tahun_kendaraan', 'asc'),
            'tahun_desc' => $query->orderBy('tahun_kendaraan', 'desc'),
            'plat_asc'   => $query->orderBy('nomor_plat', 'asc'),
            default      => $query->latest(),
        };
    } else {
        $query->latest();
    }

    $kendaraans = $query->get();

    return view('kendaraan.cari', compact('kendaraans'));
}


    public function create()
    {
        return view('kendaraan.tambah');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nomor_plat' => 'required|string|max:15|unique:kendaraans,nomor_plat',
    ],
    [
        'nomor_plat.required' => 'Nomor plat kendaraan harus diisi',
        'nomor_plat.unique' => 'Nomor plat kendaraan sudah terdaftar',
    ],
    [
        'nama_pemilik' => 'required',
        'dinas_opd' => 'required',
        'jenis_kendaraan' => 'required',
        'merk' => 'required',
        'tahun_kendaraan' => 'required|digits:4',
        'tanggal_jatuh_tempo' => 'required|date',
    ]);

    Kendaraan::create([
        'nomor_plat' => $request->nomor_plat,
        'nama_pemilik' => $request->nama_pemilik,
        'dinas_opd' => $request->dinas_opd,
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'merk' => $request->merk,
        'tahun_kendaraan' => $request->tahun_kendaraan,
        'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
        'status_pajak' => now()->gt($request->tanggal_jatuh_tempo)
            ? 'MENUNGGAK'
            : 'AKTIF',
    ]);

    return redirect('/kendaraan')
        ->with('success', 'Data kendaraan berhasil ditambahkan');
    }

    public function list()
    {
        $kendaraans = Kendaraan::latest()->get();
        return view('kendaraan.list', compact('kendaraans'));
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        $request->validate([
        'nomor_plat' => 'required|unique:kendaraans,nomor_plat,' . $id,
        'nama_pemilik' => 'required',
        'dinas_opd' => 'required',
        'jenis_kendaraan' => 'required',
        'merk' => 'required',
        'tahun_kendaraan' => 'required|digits:4',
        'tanggal_jatuh_tempo' => 'required|date',
    ]);

    $kendaraan = Kendaraan::findOrFail($id);

    $kendaraan->update([
        'nomor_plat' => $request->nomor_plat,
        'nama_pemilik' => $request->nama_pemilik,
        'dinas_opd' => $request->dinas_opd,
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'merk' => $request->merk,
        'tahun_kendaraan' => $request->tahun_kendaraan,
        'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
        'status_pajak' => now()->gt($request->tanggal_jatuh_tempo)
            ? 'MENUNGGAK'
            : 'AKTIF',
    ]);

        return redirect('/kendaraan')
            ->with('success', 'Data kendaraan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Kendaraan::findOrFail($id)->delete();

        return redirect('/kendaraan')
            ->with('success', 'Data kendaraan berhasil dihapus');
    }
    

}