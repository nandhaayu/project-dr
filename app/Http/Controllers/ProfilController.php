<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    // function index() {
    //     $profil = Profil::all();
    //     return view 
    // }
    function profilAdmin () {
        $profil = Profil::all();
        return view('backend.profil.index', compact('profil'));
    }

    function create () {
        return view('backend.profil.create');
    }
    function edit () {
        return view('backend.profil.edit');
    }

    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 45 karakter',
            'deskripsi.required' => 'jenis wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);
        
        //jika file foto ada yang terupload
        if(!empty($request->foto)){
            //maka proses berikut yang dijalankan
            $fileName = 'foto-'.uniqid().'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('assets/images'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }
        
        //tambah data produk
        DB::table('profils')->insert([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fileName,
        ]);
        
        return redirect()->route('profil.admin');
    }
}
