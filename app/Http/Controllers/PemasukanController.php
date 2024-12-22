<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pemasukan
        $data = Pemasukan::all();
        return view('pemasukan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemasukan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id' => 'required|unique:pemasukan,id',
            'pemasukan' => 'required|string',
            'tgl_masuk' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
        ], [
            'id.required' => 'ID wajib diisi.',
            'id.unique' => 'ID sudah ada.',
            'pemasukan.required' => 'Pemasukan harus diisi.',
            'tgl_masuk.required' => 'Tanggal pemasukan wajib diisi.',
            'tgl_masuk.date' => 'Format tanggal tidak sesuai.',
            'jumlah.required' => 'Jumlah pemasukan wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah pemasukan tidak boleh negatif.',
        ]);

        // Simpan data pemasukan ke database
        DB::table('pemasukan')->insert([
            'id' => $request->id,
            'pemasukan' => $request->pemasukan,
            'tgl_masuk' => $request->tgl_masuk,
            'jumlah' => $request->jumlah,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('pemasukan.index')->with('success', 'Data pemasukan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari data pemasukan berdasarkan ID
        $pemasukan = Pemasukan::findOrFail($id);

        // Tampilkan view untuk detail pemasukan
        return view('pemasukan.show', compact('pemasukan'));
    }
}