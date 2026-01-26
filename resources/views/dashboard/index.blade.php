<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Pajak Kendaraan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="background:#f5f7fa">

<nav class="navbar navbar-dark bg-primary px-4">
    <span class="navbar-brand fw-bold">
        <i class="bi bi-car-front-fill"></i> Sistem Pajak Kendaraan
    </span>

    <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-outline-light btn-sm">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</nav>

<div class="container mt-5">

    <h4 class="fw-bold mb-4">Dashboard</h4>

    <div class="row g-4">

        <!-- Cari Kendaraan -->
        <div class="col-md-4">
            <a href="/kendaraan/cari" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-search fs-1 text-primary"></i>
                        <h6 class="mt-3">Cari Kendaraan</h6>
                        <p class="text-muted small">Cari data berdasarkan nomor plat</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Tambah Kendaraan -->
        <div class="col-md-4">
            <a href="/kendaraan/tambah" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-plus-circle fs-1 text-success"></i>
                        <h6 class="mt-3">Tambah Kendaraan</h6>
                        <p class="text-muted small">Input data kendaraan baru</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- List Kendaraan -->
        <div class="col-md-4">
            <a href="/kendaraan" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-table fs-1 text-warning"></i>
                        <h6 class="mt-3">Data Kendaraan</h6>
                        <p class="text-muted small">Lihat & kelola data kendaraan</p>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>

</body>
</html>
