<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi'; // Nama tabel untuk absensi

    protected $fillable = [
        'anggota_id', // ID anggota yang hadir
        'tanggal', // Tanggal absensi
        'status' // Status kehadiran (hadir, tidak hadir, izin, dsb)
    ];

    protected $primaryKey = 'id'; // Primary key untuk absensi
    public $timestamps = true; // Gunakan timestamps untuk created_at dan updated_at
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id', 'id');
    }

}
