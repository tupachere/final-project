<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Jadwal extends Model
{
    protected $fillable = [
        'nama_kegiatan', 'tanggal', 'waktu','alamat', 'divisi'
    ];
}
