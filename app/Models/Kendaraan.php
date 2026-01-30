<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kendaraan extends Model
{
     use HasFactory;
    protected $table = 'kendaraans';
    protected $fillable = [
        'nomor_plat',
        'nama_pemilik',
        'alamat',
        'dinas_opd',
        'jenis_kendaraan',
        'merk',
        'tahun_kendaraan',
        'tanggal_jatuh_tempo',
        'status_pajak'
    ];

    // accessor status pajak
    public function getStatusPajakAttribute()
    {
        return Carbon::now()->gt(
            Carbon::parse($this->tanggal_jatuh_tempo)
        ) ? 'MENUNGGAK' : 'AKTIF';
    }

}
