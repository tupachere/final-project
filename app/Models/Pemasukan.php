<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';
    protected $primaryKey = 'id';
    public $incrementing = True;
    protected $fillable = [
        'id', // Tambahkan kolom id pada $fillable
        'pemasukan',
        'tgl_masuk',
        'jumlah',
        'timestamp'
    ];

    // public function pemasukan()
    // {

    // }
}
