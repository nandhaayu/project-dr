<?php

namespace App\Http\Controllers;

use App\Models\Syaikhuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyaikhunaController extends Controller
{
    function syaikhunaAdmin () {
        $syaikhuna = Syaikhuna::first();
        return view('backend.syaikhuna.index', compact('syaikhuna'));
    }

    function create () {
        return view('backend.syaikhuna.create');
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
        DB::table('syaikhunas')->insert([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fileName,
        ]);
        
        return redirect()->route('syaikhuna.admin');
    }

    public function edit(syaikhuna $id) {
        return view('backend.syaikhuna.edit', compact('id'));
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
        $fotoLama = DB::table('syaikhunas')->select('foto')->where('id',$id)->get();
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
        DB::table('syaikhunas')->where('id',$id)->update([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fileName,
        ]);
                
        return redirect()->route('syaikhuna.admin');
    }

    public function destroy(syaikhuna $id) {
        $id->delete();
        return redirect()->route('syaikhuna.admin')->with('succes', 'Data berhasil dihapus');
    }
}
