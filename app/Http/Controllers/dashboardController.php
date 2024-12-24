<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Kas;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAnggota = Anggota::count(); // Hitung total anggota
        $jumlahKas = Kas::sum('jumlah'); // Hitung total kas
        $jumlahPemasukan = Pemasukan::sum('jumlah'); // Hitung total pemasukan
        $jumlahPengeluaran = Pengeluaran::sum('jumlah'); // Hitung total pengeluaran
        $grandTotal = ($jumlahKas + $jumlahPemasukan) - $jumlahPengeluaran; // Total akhir setelah pengeluaran

        return view('dashboard', [
            'total' => $totalAnggota,
            'jumlah' => $jumlahKas,
            'jumlahPemasukan' => $jumlahPemasukan,
            'jumlahPengeluaran' => $jumlahPengeluaran,
            'grand_total' => $grandTotal,
        ]);
    }
}
