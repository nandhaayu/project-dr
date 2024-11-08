<?php

namespace App\Http\Controllers;

use App\Models\Rutinitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutinitasController extends Controller
{
    function rutinitasAdmin () {
        $rutinitas = Rutinitas::all();
        return view('backend.rutinitas.index', compact('rutinitas'));
    }

    function create () {
        return view('backend.rutinitas.create');
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
        DB::table('rutinitas')->insert([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect()->route('rutinitas.admin');
    }

    public function edit(rutinitas $id) {
        return view('backend.rutinitas.edit', compact('id'));
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
        DB::table('rutinitas')->where('id',$id)->update([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
                
        return redirect()->route('rutinitas.admin');
    }

    public function destroy(rutinitas $id) {
        $id->delete();
        return redirect()->route('rutinitas.admin')->with('succes', 'Data berhasil dihapus');
    }
}
