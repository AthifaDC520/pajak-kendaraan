<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Petugas</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #1e3c72, #2a5298);
        }
        .login-card {
            border-radius: 14px;
            overflow: hidden;
        }
        .login-left {
            background: linear-gradient(180deg, #0d6efd, #084298);
            color: white;
        }
        .login-left i {
            font-size: 64px;
        }
        .login-right {
            background: #fff;
        }
    </style>
</head>
<body>

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow-lg login-card" style="max-width: 900px; width: 100%;">
        <div class="row g-0">

            <!-- KIRI (VISUAL) -->
            <div class="col-md-6 d-none d-md-flex flex-column justify-content-center align-items-center login-left p-5">
                <i class="bi bi-car-front-fill mb-3"></i>
                <h3 class="fw-bold text-center">Sistem Informasi</h3>
                <p class="text-center opacity-75">
                    Pajak Kendaraan Bermotor<br>
                    BKUD KAB. SEMARANG
                </p>
            </div>

            <!-- KANAN (FORM) -->
            <div class="col-md-6 login-right p-5">
                <h4 class="fw-bold mb-2">Login Petugas</h4>
                <p class="text-muted mb-4" style="font-size: 14px;">
                    Silakan masuk menggunakan akun resmi
                </p>

                @if($errors->any())
                    <div class="alert alert-danger py-2">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control" placeholder="admin@local.com" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </form>

                <p class="text-center text-muted mt-4 mb-0" style="font-size: 12px;">
                    © {{ date('Y') }} BKUD KAB. SEMARANG
                </p>
            </div>

        </div>
    </div>
</div>

</body>
</html>
