<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view("anggota.index", compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate([
            'id',
            'nama',
            'gender',
            'ttl',
            'alamat',
            'divisi' => 'required|in:tari,karawitan,pentas seni,reog',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'id.required' => 'id wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'gender.required' => 'gender wajib diisi',
            'ttl.required' => 'tempat, tanggal lahir wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'divisi.required' => 'divisi wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        //jika file foto ada yang terupload
        if(!empty($request->foto)){
            //maka proses berikut yang dijalankan
            $fileName = 'foto-'.uniqid().'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('images'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        //tambah data Anggota
        DB::table('anggota')->insert([
            'id'=>$request->id,
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'ttl'=>$request->ttl,
            'alamat'=>$request->alamat,
            'divisi' => $request->divisi,
            'foto'=>$fileName,
        ]);

        return redirect()->route('index.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.edit', compact('anggota'));

    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data
        $request->validate([
            'id',
            'nama',
            'gender',
            'ttl',
            'alamat',
            'divisi' => 'required|in:tari,karawitan,pentas seni,reog',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ],
        [
            'id',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'gender.required' => 'gender wajib diisi',
            'ttl.required' => 'tempat, tanggal lahir wajib diisi',
            'alamat.required' => 'alamat wajib diisi',
            'divisi.required' => 'divisi wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image',
        ]);


        //foto lama
        $fotoLama = DB::table('anggota')->select('foto')->where('id',$id)->get();
        foreach($fotoLama as $f1){
            $fotoLama = $f1->foto;
        }

        //jika foto sudah ada yang terupload
        if(!empty($request->foto)){
            //maka proses selanjutnya
            if(!empty($fotoLama->foto)) unlink(public_path('images'.$fotoLama->foto));
            //proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('images'), $fileName);
        } else{
            $fileName = $fotoLama;
        }

        //update data anggota
        DB::table('anggota')->where('id',$id)->update([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'ttl'=>$request->ttl,
            'alamat'=>$request->alamat,
            'divisi' => $request->divisi,
            'foto'=>$fileName,
        ]);

        return redirect()->route('index.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $id)
    {
        $id->delete();

        return redirect()->route('index.index')
                ->with('success','Data berhasil di hapus' );
    }
}
