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
        // Melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
            'file' => 'required|mimes:docx,pdf|max:2048'
        ],
        [
            'judul.required' => 'Nama wajib diisi',
            'judul.max' => 'Nama maksimal 45 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        // Proses unggah foto
        $foto = 'nophoto.jpg';
        if ($request->hasFile('foto')) {
            // Menyimpan foto di folder 'public/pendaftaran/images'
            $foto = $request->file('foto')->store('pendaftaran/images', 'public');
        }

        // Menyimpan file dokumen jika ada yang diupload
        if ($request->hasFile('file')) {
            $fileName = 'file-' . uniqid() . '.' . $request->file->extension();
            // Menyimpan file di folder 'public/pendaftaran/files'
            $request->file->move(public_path('pendaftaran/files'), $fileName);
        } else {
            $fileName = null;
        }

        // Menambahkan data pendaftaran
        DB::table('pendaftarans')->insert([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'file' => $fileName,
        ]);

        return redirect()->route('pendaftaran.admin');
    }

    public function edit(pendaftaran $id) {
        return view('backend.pendaftaran.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        // Melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'file' => 'nullable|mimes:docx,pdf|max:2048',
        ],
        [
            'judul.required' => 'Judul wajib diisi',
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
    
        // Proses unggah foto jika ada yang diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($fotoLama && file_exists(public_path('storage/pendaftaran/images/' . $fotoLama))) {
                unlink(public_path('storage/pendaftaran/images/' . $fotoLama));
            }
            
            // Simpan foto baru menggunakan store()
            $fotoFileName = $request->file('foto')->store('pendaftaran/images', 'public');
        } else {
            // Jika tidak ada foto baru, gunakan foto lama
            $fotoFileName = $fotoLama;
        }
    
        // Proses unggah file jika ada yang diupload
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($fileLama && file_exists(public_path('storage/pendaftaran/files/' . $fileLama))) {
                unlink(public_path('storage/pendaftaran/files/' . $fileLama));
            }
    
            // Simpan file baru menggunakan store()
            $fileName = $request->file('file')->store('storage/pendaftaran/files', 'public');
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
