<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\RutinitasUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RutinitasUmumController extends Controller
{
    function rutinitasUmumAdmin () {
        $rutinitas = RutinitasUmum::all();
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.rutinitasUmum.index', compact('rutinitas', 'jumlahNotifikasi', 'pendaftars'));
    }

    function create () {

        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.rutinitasUmum.create', compact('jumlahNotifikasi', 'pendaftars'));
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

        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.rutinitasUmum.edit', compact('id', 'jumlahNotifikasi', 'pendaftars'));
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
