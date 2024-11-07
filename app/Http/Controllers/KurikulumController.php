<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumController extends Controller
{
    function kurikulumAdmin () {
        $kurikulum = Kurikulum::all();
        return view('backend.kurikulum.index', compact('kurikulum'));
    }

    function create () {
        return view('backend.kurikulum.create');
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
        DB::table('kurikulums')->insert([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fileName,
        ]);
        
        return redirect()->route('kurikulum.admin');
    }

    public function edit(Kurikulum $id) {
        return view('backend.kurikulum.edit', compact('id'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'judul.required' => 'Judul Wajib diisi',
            'deskripsi.required' => 'deskripsi wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        //foto lama
        $fotoLama = DB::table('kurikulums')->select('foto')->where('id',$id)->get();
        foreach($fotoLama as $f1){
            $fotoLama = $f1->foto;
        }
    
        //jika foto sudah ada yang terupload
        if(!empty($request->foto)){
            //maka proses selanjutnya
            if(!empty($fotoLama->foto)) unlink(public_path('assets/images'.$fotoLama->foto));
            //proses ganti foto
            $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('assets/images'), $fileName);
        } else{
            $fileName = $fotoLama;
        }
    
        //update data produk
        DB::table('kurikulums')->where('id',$id)->update([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fileName,
        ]);
                
        return redirect()->route('kurikulum.admin');
    }

    public function destroy(kurikulum $id) {
        $id->delete();
        return redirect()->route('kurikulum.admin')->with('succes', 'Data berhasil dihapus');
    }
}
