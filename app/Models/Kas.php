<?php

// Kas.php (Model)
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;


    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id_anggota', // Tambahkan kolom id_anggota pada $fillable
        'tgl_kas',
        'jumlah',
        'timestamp'
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id'); // Sesuaikan dengan kolom yang ada di tabel kas
    }
}
