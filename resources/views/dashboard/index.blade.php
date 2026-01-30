<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Pajak Kendaraan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="
    background-image:url('https://cdn.visiteliti.com/article/2023-02/24/1q2zGJ1I28HBt48goihv_1677226351.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    min-height: 100vh;
">

<div class="bg-white bg-opacity-50 min-vh-100 d-flex flex-column"
     style="backdrop-filter: blur(4px);">

    <!-- NAVBAR -->
    <nav class="navbar navbar-dark bg-secondary px-4">
        <span class="navbar-brand fw-bold">
            <img src="{{ asset('https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Seal_of_Semarang_Regency.svg/960px-Seal_of_Semarang_Regency.svg.png') }}"
                    class="mb-3"
                    style="height:40px;">
            <!-- <i class="bi bi-car-front-fill"></i>  -->
            Beranda Sistem Informasi Pajak Kendaraan
        </span>

        @auth
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        @else
            <a href="/login" class="btn btn-outline-light btn-sm">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
        @endauth
    </nav>

    <!-- KONTEN -->
    <main class="flex-grow-1">
        <div class="container mt-5">

            <!-- <h4 class=" fw-bold mb-4">Ringkasan Data</h4> -->

            <!-- INSIGHT -->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-car-front fs-1 text-primary"></i>
                            <h5 class="mt-2">{{ $total }}</h5>
                            <small class="text-muted">Total Kendaraan</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-check-circle fs-1 text-success"></i>
                            <h5 class="mt-2">{{ $aktif }}</h5>
                            <small class="text-muted">Status Aktif</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-exclamation-circle fs-1 text-danger"></i>
                            <h5 class="mt-2">{{ $menunggak }}</h5>
                            <small class="text-muted">Menunggak</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card shadow-sm border-0 text-center">
                        <div class="card-body">
                            <i class="bi bi-calendar-event fs-1 text-warning"></i>
                            <h5 class="mt-2">{{ $jatuhTempo }}</h5>
                            <small class="text-muted">Jatuh Tempo 30 Hari</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MENU -->
            <div class="row g-4">
                <div class="col-md-6">
                    <a href="/kendaraan/cari" class="text-decoration-none">
                        <div class="card shadow-sm border-0 h-100 text-center">
                            <div class="card-body">
                                <i class="bi bi-search fs-1 text-primary"></i>
                                <h6 class="mt-3">Cari Kendaraan</h6>
                                <p class="text-muted small">Cari berdasarkan nomor plat</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6">
                    <a href="/kendaraan" class="text-decoration-none">
                        <div class="card shadow-sm border-0 h-100 text-center">
                            <div class="card-body">
                                <i class="bi bi-table fs-1 text-warning"></i>
                                <h6 class="mt-3">Data Kendaraan</h6>
                                <p class="text-muted small">Lihat daftar kendaraan</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- FOOTER -->
    <footer class="text-center py-3 border-top text-white bg-primary">
        © {{ date('Y') }} Sistem Informasi Pajak Kendaraan <br>
        Dikelola oleh Badan Keuangan Daerah Kabupaten Semarang
    </footer>

</div>

</body>

</html>
