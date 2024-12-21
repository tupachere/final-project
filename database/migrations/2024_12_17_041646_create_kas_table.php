<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('kas', function (Blueprint $table) {
    //         $table->id();
    //         $table->date('tgl_kas');
    //         $table->integer('jumlah');
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('kas');
    // }

    public function up()
    {
        // Menambah kolom 'id_anggota' ke tabel 'kas'
        Schema::table('kas', function (Blueprint $table) {
            $table->string('id_anggota')->after('id');  // Pastikan 'id_anggota' bertipe string
        });
    // Schema::table('kas', function (Blueprint $table) {
    //     $table->unsignedBigInteger('id_anggota')->change(); // Ubah ke INT
    // });
    }

    public function down()
    {
        // Mengembalikan tipe data ke default jika rollback
        Schema::table('kas', function (Blueprint $table) {
            $table->dropColumn('id_anggota');
        });
    }

};
