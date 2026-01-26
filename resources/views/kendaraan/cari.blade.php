<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cari Kendaraan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f7fa">

<div class="container mt-5">

    <h4 class="mb-4 fw-bold">Cari Kendaraan</h4>

    <form method="POST" action="/kendaraan/cari" class="card p-4 shadow-sm border-0">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nomor Plat</label>
            <input type="text" name="nomor_plat" class="form-control" placeholder="B 1234 XYZ" required>
        </div>

        <button class="btn btn-primary">
            Cari
        </button>
    </form>

    <div class="mt-3">
        <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">
            ← Kembali ke Beranda
        </a>
    </div>

    {{-- HASIL --}}
    @isset($kendaraan)
        <div class="card mt-4 shadow-sm border-0">
            <div class="card-body">

                @if($kendaraan)
                    <h6 class="fw-bold mb-3">Data Kendaraan</h6>

                    <table class="table table-bordered">
                        <tr><th>Plat</th><td>{{ $kendaraan->nomor_plat }}</td></tr>
                        <tr><th>Pemilik</th><td>{{ $kendaraan->nama_pemilik }}</td></tr>
                        <tr><th>Jenis</th><td>{{ $kendaraan->jenis_kendaraan }}</td></tr>
                        <tr><th>Merk</th><td>{{ $kendaraan->merk }}</td></tr>
                        <tr><th>Tahun</th><td>{{ $kendaraan->tahun_kendaraan }}</td></tr>
                        <tr><th>Jatuh Tempo</th><td>{{ $kendaraan->tanggal_jatuh_tempo }}</td></tr>
                        <tr>
                            <th>Status Pajak</th>
                            <td>
                                <span class="badge {{ $kendaraan->status_pajak == 'MENUNGGAK' ? 'bg-danger' : 'bg-success' }}">
                                    {{ $kendaraan->status_pajak }}
                                </span>
                            </td>
                        </tr>
                    </table>
                @else
                    <div class="alert alert-warning text-center">
                        Data kendaraan tidak ditemukan
                    </div>
                @endif

            </div>
        </div>
    @endisset

</div>

</body>
</html>
