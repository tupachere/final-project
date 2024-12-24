<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $primaryKey = 'id';
    public $incrementing = True;
    protected $fillable = [
        'id', // Tambahkan kolom id pada $fillable
        'pengeluaran',
        'tgl_keluar',
        'jumlah',
        'timestamp'
    ];

    // public function pengeluaran()
    // {

    // }
}
