<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class AbsensiController extends Controller
{
    // Fungsi untuk menyimpan absensi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'absensi.*.anggota_id' => 'required|exists:anggota,id', // Pastikan anggota_id ada dan valid
            'absensi.*.tanggal' => 'required|date',
            'absensi.*.status' => 'required|in:hadir,tidak hadir,izin',
        ]);

        // Menyimpan data absensi
        foreach ($request->absensi as $data) {
            Absensi::create([
                'anggota_id' => $data['anggota_id'],
                'tanggal' => $data['tanggal'],
                'status' => $data['status'],
            ]);
        }

        return redirect()->back()->with('success', 'Absensi berhasil disimpan!');
    }

    // Menampilkan data absensi
    public function index()
    {
        $absensi = Absensi::with('anggota')->get();
        return view('absensi.absensi', compact('absensi'));
    }

    // Menampilkan laporan absensi
    public function laporan(Request $request)
    {
        // Mengambil data absensi dengan filter tanggal jika ada
        $query = Absensi::with('anggota');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        // Mengambil data absensi yang sudah difilter
        $absensi = $query->get();

        // Mengirim data absensi ke view
        return view('absensi.laporan', compact('absensi'));
    }


    // Fungsi untuk menggenerate PDF
    public function generatePDF(Request $request)
    {
        // Mengambil data absensi dengan filter tanggal jika ada
        $query = Absensi::with('anggota');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('tanggal', [$request->start_date, $request->end_date]);
        }

        // Mengambil data absensi yang sudah difilter
        $absensi = $query->get();

        // Load view dan buat PDF
        $pdf = PDF::loadView('absensi.laporan-pdf', compact('absensi'));

        // Mengunduh file PDF
        return $pdf->download('absensi-laporan.pdf');
    }

}
