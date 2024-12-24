<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all(); // Tampilkan semua jadwal
        return view('jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        return view('jadwals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'divisi' => 'required|string|max:50',
            'alamat' => 'nullable|string',
        ]);

        // Simpan data ke database
        $jadwal = Jadwal::create($request->all());

        // Cek apakah data berhasil disimpan
        if ($jadwal) {
            return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil ditambahkan.');
        } else {
            return back()->with('error', 'Terjadi kesalahan saat menambahkan jadwal.');
        }
    }



    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwals.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'divisi' => 'required|string|max:50',
            'alamat' => 'nullable|string', // Field waktu opsional dan validasi format
        ]);

        $jadwal = Jadwal::findOrFail($id);

        // Update hanya field yang diisi
        $dataToUpdate = $request->only(['nama_kegiatan', 'tanggal', 'divisi', 'alamat']);

        // Jika waktu diisi, tambahkan ke data yang akan diupdate
        if ($request->filled('waktu')) {
            $dataToUpdate['waktu'] = $request->waktu;
        }

        $jadwal->update($dataToUpdate);

        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();
        return redirect()->route('jadwals.index');
    }
}
