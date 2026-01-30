<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kendaraan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: rgba(255,255,255,0.9);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        /* Biar konten tetap kebaca */
        /* .container {
            background: rgba(255,255,255,0.9);
            border-radius: 12px;
            padding: 24px;
        } */
    </style>

</head>
<body>

<div class="container py-5">

    <!-- Judul -->
    <div class="text-center mb-4">
        <i class="bi bi-plus-circle fs-1 text-primary"></i>
        <h3 class="fw-bold mt-2">Tambah Kendaraan</h3>
        <p class="text-muted">Input data kendaraan baru</p>
    </div>

    <!-- Alert sukses -->
    @if(session('primary'))
        <div class="alert alert-primary text-center">
            {{ session('primary') }}
        </div>
    @endif

    <!-- Alert eror -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <!-- Card Form -->
    <div class="card shadow border-0 mb-4">
        <div class="card-body p-4">

            <form method="POST" action="/kendaraan/tambah">
                @csrf

                <div class="row g-3">

                    <!-- Nomor Plat -->
                    <div class="col-md-6">
                        <label class="form-label">Nomor Plat</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-credit-card-2-front"></i>
                            </span>
                            <input type="text" name="nomor_plat" class="form-control" placeholder="B 1234 XYZ" required>
                        </div>
                    </div>

                    <!-- Nama Pengguna -->
                    <div class="col-md-6">
                        <label class="form-label">Nama Pengguna</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" name="nama_pemilik" class="form-control" required>
                        </div>
                    </div>

                    <!-- DINAS / OPD -->
                    <div class="col-md-6">
                        <label class="form-label">DINAS / OPD</label>
                        <select name="dinas_opd" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option>Opsi1</option>
                            <option>Opsi2</option>
                        </select>
                    </div>

                    <!-- Jenis Kendaraan -->
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="form-select" required>
                            <option value="">-- Pilih --</option>
                            <option>Motor</option>
                            <option>Mobil</option>
                        </select>
                    </div>

                    <!-- Merk -->
                    <div class="col-md-6">
                        <label class="form-label">Merk</label>
                        <input type="text" name="merk" class="form-control" placeholder="Honda / Toyota" required>
                    </div>

                    <!-- Tahun -->
                    <div class="col-md-6">
                        <label class="form-label">Tahun Kendaraan</label>
                        <input type="number" name="tahun_kendaraan" class="form-control" min="1970" max="{{ date('Y') }}" required>
                    </div>

                    <!-- Jatuh Tempo -->
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Jatuh Tempo Pajak</label>
                        <input type="date" name="tanggal_jatuh_tempo" class="form-control" required>
                    </div>

                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Data
                    </button>
                </div>

            </form>

        </div>
    </div>

    <div class="mt-3">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary">
            ← Kembali ke Beranda
        </a>
    </div>

</div>

</body>
</html>
