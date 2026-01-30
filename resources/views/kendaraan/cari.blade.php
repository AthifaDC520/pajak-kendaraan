<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cari Kendaraan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f7fa">

<div class="container mt-5">

    <!-- <h4 class="mb-4 fw-bold">Cari Kendaraan</h4> <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-4">
        ← Kembali ke Beranda
    </a> -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0"><i class="bi bi-search fs-1 text-primary"></i> Cari Kendaraan</h4>

        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
            ← Kembali ke Beranda
        </a>
    </div>


    {{-- FORM --}}
    <div class="card p-4 shadow-sm border-0 mb-4">
        <form method="POST" action="/kendaraan/cari" class="card p-4 shadow-sm border-0 mb-4">
            @csrf

            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Nomor Plat</label>
                    <input type="text" name="nomor_plat" value="{{ request('nomor_plat') }}"
                        class="form-control" placeholder="B 1234">
                </div>

                <div class="col-md-3">
                    <label class="form-label">DINAS / OPD</label>
                    <input type="text" name="dinas_opd" value="{{ request('dinas_opd') }}"
                        class="form-control" placeholder="Dinas Perhubungan">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Tahun</label>
                    <input type="number" name="tahun_kendaraan" value="{{ request('tahun_kendaraan') }}"
                        class="form-control" placeholder="2022">
                </div>

                <div class="col-md-2">
                    <label class="form-label">Status Pajak</label>
                    <select name="status_pajak" class="form-select">
                        <option value="">Semua</option>
                        <option value="AKTIF" {{ request('status_pajak') == 'AKTIF' ? 'selected' : '' }}>AKTIF</option>
                        <option value="MENUNGGAK" {{ request('status_pajak') == 'MENUNGGAK' ? 'selected' : '' }}>MENUNGGAK</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Urutkan</label>
                    <select name="sort" class="form-select">
                        <option value="">Default</option>
                        <option value="tahun_asc">Tahun ↑</option>
                        <option value="tahun_desc">Tahun ↓</option>
                        <option value="plat_asc">Plat A-Z</option>
                    </select>
                </div>

            </div>

            <div class="mt-3 d-flex gap-2">
                <button class="btn btn-primary">
                    Telusuri
                </button>

                <a href="/kendaraan/cari" class="btn btn-outline-secondary">
                    Reset
                </a>
            </div>
        </form>
    </div>

    

    {{-- HASIL --}}
    @if(isset($kendaraans))
        <div class="card shadow-sm border-0">
            <div class="card-body">

                @if($kendaraans->count())
                    <h5 class="fw-bold mb-3">
                        Hasil Pencarian ({{ $kendaraans->count() }} data)
                    </h5>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Plat</th>
                                    <th>Pengguna</th>
                                    <th>OPD</th>
                                    <th>Jenis</th>
                                    <th>Merk</th>
                                    <th>Tahun</th>
                                    <th>Status Pajak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kendaraans as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nomor_plat }}</td>
                                        <td>{{ $item->nama_pemilik }}</td>
                                        <td>{{ $item->dinas_opd }}</td>
                                        <td>{{ $item->jenis_kendaraan }}</td>
                                        <td>{{ $item->merk }}</td>
                                        <td>{{ $item->tahun_kendaraan }}</td>
                                        <td>
                                            <span class="badge {{ $item->status_pajak == 'MENUNGGAK' ? 'bg-danger' : 'bg-success' }}">
                                                {{ $item->status_pajak }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @else
                    <div class="alert alert-warning text-center mb-0">
                        Data kendaraan tidak ditemukan
                    </div>
                @endif

            </div>
        </div>
    @endif


</div>

</body>
</html>
