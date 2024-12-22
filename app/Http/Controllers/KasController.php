<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $data = Kas::all(); // Ambil data kas
        return view('kas.index', compact('data'));

        // Ambil data kas dengan relasi anggota
        $data = Kas::with('anggota')->get(); // Pastikan relasi sudah benar
        return view('kas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // Ambil semua data anggota dari tabel anggota
    $anggota = Anggota::all();

    // Kirim data anggota ke view
    return view('kas.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_anggota' => 'required|string',
            'tgl_kas' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
        ], [
            'id_anggota.required' => 'ID wajib diisi.',
            'tgl_kas.required' => 'Tanggal kas wajib diisi.',
            'tgl_kas.date' => 'Format tanggal tidak sesuai.',
            'jumlah.required' => 'Jumlah kas wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah kas tidak boleh negatif.',
        ]);

        // Menyimpan data kas dengan UUID
        DB::table('kas')->insert([
            'id' => (string) Str::uuid(), // Generate UUID untuk kolom id
            'id_anggota' => $request->id_anggota,
            'tgl_kas' => $request->tgl_kas,
            'jumlah' => $request->jumlah,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil ditambahkan.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kas = Kas::find($id);
        return view ('kas.update', compact('kas'));

        // $anggota = Anggota::all(); // Ambil semua data anggota untuk dropdown
        // return view('kas.edit', compact('kas', 'anggota'));
    }


        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Cari data kas berdasarkan ID
        $kas = Kas::find($id);
        if (!$kas) {
            return redirect()->route('kas.index')->with('error', 'Data kas tidak ditemukan.');
        }
        // Perbarui data kas menggunakan Eloquent
        $kas->update([
            'id_anggota' => $request->id_anggota,
            'tgl_kas' => $request->tgl_kas,
            'jumlah' => $request->jumlah,
        ]);
        // Validasi input
        $request->validate([
            'id_anggota' => 'required|string|exists:anggota,id', // Pastikan anggota valid
            'tgl_kas' => 'required|date',
            'jumlah' => 'required|numeric|min:0',
        ], [
            'id_anggota.required' => 'ID Anggota wajib diisi.',
            'id_anggota.exists' => 'Anggota tidak ditemukan.',
            'tgl_kas.required' => 'Tanggal kas wajib diisi.',
            'tgl_kas.date' => 'Format tanggal tidak sesuai.',
            'jumlah.required' => 'Jumlah kas wajib diisi.',
            'jumlah.numeric' => 'Jumlah harus berupa angka.',
            'jumlah.min' => 'Jumlah kas tidak boleh negatif.',
        ]);



        // Redirect dengan pesan sukses
        return redirect()->route('kas.index')->with('success', 'Data kas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('kas')->where('id', $id)->delete();

        return redirect()->route('kas.index')->with('success', 'Data kas berhasil dihapus.');
    }
}
