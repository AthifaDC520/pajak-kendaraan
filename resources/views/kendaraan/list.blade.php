<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body style="background:#f4f6f9">

<div class="container py-5">

    <!-- <div class="d-flex justify-content-between mb-3">
        <h4><i class="bi bi-car-front"></i> Data Kendaraan</h4>
        @if(auth()->check())
            <a href="/kendaraan/tambah" class="btn btn-primary">Tambah Kendaraan</a>
        @else
            <a href="/login" class="btn btn-outline-primary">Login untuk Tambah Data</a>
        @endif

    </div> -->

    <div class="d-flex justify-content-between align-items-center mb-4">

    <h4 class="mb-0">
        <i class="bi bi-car-front"></i> Data Kendaraan
    </h4>

    <div class="d-flex gap-2">
        @if(auth()->check())
            <a href="/kendaraan/tambah" class="btn btn-primary">
                Tambah Kendaraan
            </a>
        @endif

        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
            ← Kembali ke Beranda
        </a>
    </div>

</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow border-0">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Plat</th>
                        <th>Pengguna</th>
                        <th>DINAS / OPD</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th>Tahun Kendaraan</th>
                        <th>Jatuh Tempo</th>
                        <th>Status Pajak</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kendaraans as $k)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><strong>{{ $k->nomor_plat }}</strong></td>
                        <td>{{ $k->nama_pemilik }}</td>
                        <td>{{ $k->dinas_opd }}</td>
                        <td>{{ $k->jenis_kendaraan }}</td>
                        <td>{{ $k->merk }}</td>
                        <td>{{ $k->tahun_kendaraan }}</td>
                        <td>{{ $k->tanggal_jatuh_tempo }}</td>
                        <td>{{ $k->status_pajak }}</td>
                        <td>
                            <span class="badge {{ $k->status_pajak == 'AKTIF' ? 'bg-success' : 'bg-danger' }}">
                                {{ $k->status_pajak }}
                            </span>
                        </td>

                        <td>
                            <a href="/kendaraan/{{ $k->id }}/edit" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <form action="/kendaraan/{{ $k->id }}/hapus" 
                                    method="POST" 
                                    class="d-inline"
                                    onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    @if($kendaraans->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada data kendaraan
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- <div class="mt-3">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
            ← Kembali ke Beranda
        </a>
    </div> -->


</div>
</body>
</html>
