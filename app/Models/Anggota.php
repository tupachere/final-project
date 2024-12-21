<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota'; // Nama tabel yang ada di database

    protected $fillable = [
        'id',
        'nama',
        'gender',
        'ttl',
        'alamat',
        'divisi',
        'foto'
    ];

    public function kas()
    {
        return $this->hasMany(Kas::class, 'id_anggota', 'id');
    }


    protected $primaryKey = 'id';
    public $incrementing = false; // Non-auto increment
    protected $keyType = 'string'; // Primary key tipe string
}
