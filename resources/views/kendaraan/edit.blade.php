<!DOCTYPE html>
<html>
<head>
    <title>Edit Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f4f6f9">

<div class="container py-5">
    <h4 class="mb-4">Edit Data Kendaraan</h4>

    <div class="card shadow">
        <div class="card-body">
            <form method="POST" action="/kendaraan/{{ $kendaraan->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nomor Plat</label>
                    <input type="text" name="nomor_plat" class="form-control"
                           value="{{ $kendaraan->nomor_plat }}">
                </div>

                <div class="mb-3">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" class="form-control"
                           value="{{ $kendaraan->nama_pemilik }}">
                </div>

                <div class="mb-3">
                    <label>Jenis Kendaraan</label>
                    <input type="text" name="jenis_kendaraan" class="form-control"
                           value="{{ $kendaraan->jenis_kendaraan }}">
                </div>

                <div class="mb-3">
                    <label>Merk</label>
                    <input type="text" name="merk" class="form-control"
                           value="{{ $kendaraan->merk }}">
                </div>

                <div class="mb-3">
                    <label>Tahun Kendaraan</label>
                    <input type="number" name="tahun_kendaraan" class="form-control" min="1990" max="{{ date('Y') }}" 
                            value="{{ $kendaraan->tahun_kendaraan }}">
                </div>
                    
                <div class="mb-3">
                    <label>Jatuh Tempo Pajak</label>
                    <input type="date" name="tanggal_jatuh_tempo" class="form-control"
                           value="{{ $kendaraan->tanggal_jatuh_tempo }}">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="/kendaraan" class="btn btn-secondary me-2">Batal</a>
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>

</body>
</html>
