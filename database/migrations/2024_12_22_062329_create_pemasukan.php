<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key bertipe string
            $table->string('pemasukan'); // Kolom pemasukan
            $table->date('tgl_masuk'); // Kolom tanggal pemasukan
            $table->decimal('jumlah', 15, 2); // Kolom jumlah dengan tipe decimal
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
