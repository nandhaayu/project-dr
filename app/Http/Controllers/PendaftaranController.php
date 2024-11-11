<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    function pendaftaranAdmin () {
        $pendaftaran = Pendaftaran::first();
        return view('backend.pendaftaran.index', compact('pendaftaran'));
    }

    function create () {
        return view('backend.pendaftaran.create');
    }

    public function store(Request $request)
    {
        // melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'file' => 'required|mimes:docx,pdf|max:2048'
        ],
        [
            'judul.required' => 'Nama wajib diisi',
            'judul.max' => 'Nama maksimal 45 karakter',
            'deskripsi.required' => 'jenis wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);
        
         // Menyimpan file foto jika ada yang diupload
        if ($request->hasFile('foto')) {
            $fotoFileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            // Menyimpan foto di folder 'public/assets/images'
            $request->foto->move(public_path('assets/images'), $fotoFileName);
        } else {
            // Foto default jika tidak ada foto yang diupload
            $fotoFileName = 'nophoto.jpg';
        }

        // Menyimpan file dokumen jika ada yang diupload
        if ($request->hasFile('file')) {
            $fileName = 'file-' . uniqid() . '.' . $request->file->extension();
            // Menyimpan file di folder 'public/assets/files'
            $request->file->move(public_path('assets/files'), $fileName);
        } else {
            // Bisa disesuaikan jika file tidak diupload (misalnya null atau pesan error tambahan)
            $fileName = null;
        }
        
        //tambah data produk
        DB::table('pendaftarans')->insert([
            'judul'=>$request->judul,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fotoFileName,
            'file' => $fileName,
        ]);
        
        return redirect()->route('pendaftaran.admin');
    }


    public function edit(pendaftaran $id) {
        return view('backend.pendaftaran.edit', compact('id'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'file' => 'nullable|mimes:docx,pdf|max:2048',
        ],
        [
            'judul.required' => 'Judul Wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image',
            'file.mimes' => 'File ekstensi hanya bisa docx,pdf',
            'file.max' => 'File maksimal 2 MB'
        ]);
    
        // Ambil data foto lama dari database
        $pendaftaran = DB::table('pendaftarans')->where('id', $id)->first();
        $fotoLama = $pendaftaran->foto;
        $fileLama = $pendaftaran->file;
    
        // Jika ada foto yang diupload, proses upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fotoLama && file_exists(public_path('assets/images/' . $fotoLama))) {
                unlink(public_path('assets/images/' . $fotoLama));
            }
            
            // Proses foto baru
            $fotoFileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/images'), $fotoFileName);
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $fotoFileName = $fotoLama;
        }
    
        // Jika ada file yang diupload (misalnya dokumen), proses upload file baru
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($fileLama && file_exists(public_path('assets/files/' . $fileLama))) {
                unlink(public_path('assets/files/' . $fileLama));
            }
    
            // Proses file baru
            $fileName = 'file-' . uniqid() . '.' . $request->file->extension();
            $request->file->move(public_path('assets/files'), $fileName);
        } else {
            // Jika tidak ada file baru, gunakan file lama
            $fileName = $fileLama;
        }
    
        // Update data pendaftaran di database
        DB::table('pendaftarans')->where('id', $id)->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoFileName,
            'file' => $fileName,
        ]);
    
        return redirect()->route('pendaftaran.admin')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(pendaftaran $id) {
        $id->delete();
        return redirect()->route('pendaftaran.admin')->with('succes', 'Data berhasil dihapus');
    }
}
