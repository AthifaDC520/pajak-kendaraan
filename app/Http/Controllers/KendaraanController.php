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
        $kendaraan = Kendaraan::where('nomor_plat', $request->nomor_plat)->first();

        if (!$kendaraan) {
        return back()->with('not_found', true);
    }

    return view('kendaraan.cari', compact('kendaraan'));
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
        'jenis_kendaraan' => 'required',
        'merk' => 'required',
        'tahun_kendaraan' => 'required|digits:4',
        'tanggal_jatuh_tempo' => 'required|date',
    ]);

    Kendaraan::create([
        'nomor_plat' => $request->nomor_plat,
        'nama_pemilik' => $request->nama_pemilik,
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
        'jenis_kendaraan' => 'required',
        'merk' => 'required',
        'tahun_kendaraan' => 'required|digits:4',
        'tanggal_jatuh_tempo' => 'required|date',
    ]);

    $kendaraan = Kendaraan::findOrFail($id);

    $kendaraan->update([
        'nomor_plat' => $request->nomor_plat,
        'nama_pemilik' => $request->nama_pemilik,
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