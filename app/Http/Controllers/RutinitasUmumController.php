<?php

namespace App\Http\Controllers;

use App\Models\RutinitasUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutinitasUmumController extends Controller
{
    function rutinitasUmumAdmin () {
        $rutinitas = RutinitasUmum::all();
        return view('backend.rutinitasUmum.index', compact('rutinitas'));
    }

    function create () {
        return view('backend.rutinitasUmum.create');
    }

    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
        ],
        [
            'judul.required' => 'Nama wajib diisi',
            'judul.max' => 'Nama maksimal 45 karakter',
            'deskripsi.required' => 'jenis wajib diisi',

        ]);
        
        //tambah data produk
        DB::table('rutinitas_umums')->insert([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect()->route('rutinitas.umum.admin');
    }

    public function edit(RutinitasUmum $id) {
        return view('backend.rutinitasUmum.edit', compact('id'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
        ],
        [
            'judul.required' => 'Judul Wajib diisi',
            'deskripsi.required' => 'deskripsi wajib diisi',
        ]);
    
        //update data produk
        DB::table('rutinitas_umums')->where('id',$id)->update([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
                
        return redirect()->route('rutinitas.umum.admin');
    }

    public function destroy(RutinitasUmum $id) {
        $id->delete();
        return redirect()->route('rutinitas.umum.admin')->with('succes', 'Data berhasil dihapus');
    }
}
