<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Kas;

class ChartController extends Controller
{
    // Metode untuk menampilkan Area Chart
    public function showChart()
    {
        // Mengambil total pemasukan per bulan
        $pemasukan = Pemasukan::selectRaw('MONTH(tgl_masuk) as month, SUM(jumlah) as total')
                            ->groupBy('month')
                            ->pluck('total', 'month');

        // Mengambil total pengeluaran per bulan
        $pengeluaran = Pengeluaran::selectRaw('MONTH(tgl_keluar) as month, SUM(jumlah) as total')
                                ->groupBy('month')
                                ->pluck('total', 'month');

        // Mengambil total kas per bulan
        $kas = Kas::selectRaw('MONTH(tgl_kas) as month, SUM(jumlah) as total')
                ->groupBy('month')
                ->pluck('total', 'month');

        // Mengirim data ke view
        return view('charts.area', compact('pemasukan', 'pengeluaran', 'kas'));
    }
}
