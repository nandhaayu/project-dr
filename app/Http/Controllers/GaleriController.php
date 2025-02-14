<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    function galeriAdmin () {
        $galeri = Galeri::all();
        return view('backend.galeri.index', compact('galeri'));
    }

    function create () {
        return view('backend.galeri.create');
    }

    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
        ],
        [
            'judul.required' => 'Nama wajib diisi',
            'judul.max' => 'Nama maksimal 45 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        // Proses unggah foto jika ada yang diupload
        if ($request->hasFile('foto')) {
            // Menyimpan foto menggunakan store() dan menempatkannya di folder 'public/pendaftaran/images'
            $fileName = $request->file('foto')->store('galeri', 'public');
        } else {
            // Foto default jika tidak ada foto yang diupload
            $fileName = 'nophoto.jpg';
        }

        // Menambahkan data ke tabel galeris
        DB::table('galeris')->insert([
            'judul' => $request->judul,
            'foto' => $fileName,
        ]);

        return redirect()->route('galeri.admin');
    }

    public function edit(galeri $id) {
        return view('backend.galeri.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        // Melakukan validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'judul.required' => 'Judul wajib diisi',
            'judul.max' => 'Judul maksimal 45 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        // Mengambil data foto lama
        $galeri = DB::table('galeris')->where('id', $id)->first();
        $fotoLama = $galeri->foto;

        // Proses unggah foto jika ada
        $foto = $fotoLama;
        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($fotoLama && file_exists(public_path('storage/galeri/' . $fotoLama))) {
                unlink(public_path('storage/galeri/' . $fotoLama));
            }

            // Simpan foto baru menggunakan store() dan simpan di folder 'public/galeri'
            $foto = $request->file('foto')->store('galeri', 'public');
        }

        // Update data galeri di database
        DB::table('galeris')->where('id', $id)->update([
            'judul' => $request->judul,
            'foto' => $foto,
        ]);

        return redirect()->route('galeri.admin')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(galeri $id) {
        $id->delete();
        return redirect()->route('galeri.admin')->with('succes', 'Data berhasil dihapus');
    }
}
