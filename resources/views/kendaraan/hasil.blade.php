@if($kendaraan)
    <p>Plat: {{ $kendaraan->nomor_plat }}</p>
    <p>Nama: {{ $kendaraan->nama_pemilik }}</p>
    <p>Jatuh Tempo: {{ $kendaraan->tanggal_jatuh_tempo }}</p>
@else
    <p>Data tidak ditemukan</p>
@endif
