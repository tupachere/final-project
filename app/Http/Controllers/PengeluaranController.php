<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = Pengeluaran::all(); // Ambil data pengeluaran
        return view('pengeluaran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id',
            'pengeluaran',
            'tgl_keluar' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
        ], [
            'id.required' => 'ID wajib diisi.',
            'pengeluaran' => 'pengeluaran harus diisi.',
            'tgl_keluar.required' => 'Tanggal pengeluaran wajib diisi.',
            'tgl_keluar.date' => 'Format tanggal tidak sesuai.',
            'jumlah.required' => 'Jumlah pengeluaran wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah pengeluaran tidak boleh negatif.',
        ]);

        // Menyimpan data pengeluaran
        DB::table('pengeluaran')->insert([
            'id' => $request->id,
            'pengeluaran' => $request->pengeluaran,
            'tgl_keluar' => $request->tgl_keluar,
            'jumlah' => $request->jumlah,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pengeluaran.index')->with('success', 'Data pengeluaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari data pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Tampilkan view untuk detail pengeluaran
        return view('pengeluaran.show', compact('pengeluaran'));
    }
}
