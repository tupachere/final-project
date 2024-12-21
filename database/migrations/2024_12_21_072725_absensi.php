<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id(); // Primary key untuk absensi
            $table->string('anggota_id'); // ID anggota (relasi dengan anggota)
            $table->date('tanggal'); // Tanggal absensi
            $table->enum('status', ['hadir', 'tidak hadir', 'izin']); // Status absensi
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
