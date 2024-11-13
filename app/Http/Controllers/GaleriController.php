<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    function galeriAdmin () {
        $galeri = Post::all();
        return view('backend.galeri.index', compact('galeri'));
    }

    function create () {
        return view('backend.galeri.create');
    }

    public function store(Request $request)
{
    // melakukan validasi data
    $request->validate([
        'judul' => 'required|max:45',
        'deskripsi' => 'required',
        'slug' => 'required|alpha_dash|unique:galeris,slug|max:50', // Validasi slug
        'author_id' => 'required|exists:users,id', // Validasi author_id agar sesuai dengan ID pengguna yang ada di tabel users
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg',
    ],
    [
        'judul.required' => 'Judul wajib diisi',
        'judul.max' => 'Judul maksimal 45 karakter',
        'deskripsi.required' => 'Deskripsi wajib diisi',
        'slug.required' => 'Slug wajib diisi',
        'slug.alpha_dash' => 'Slug hanya boleh berisi huruf, angka, tanda hubung, atau underscore',
        'slug.unique' => 'Slug sudah ada, gunakan slug lain',
        'slug.max' => 'Slug maksimal 50 karakter',
        'author_id.required' => 'Author ID wajib diisi',
        'author_id.exists' => 'Author ID tidak valid, pastikan ID pengguna ada di database',
        'foto.max' => 'Foto maksimal 2 MB',
        'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'foto.image' => 'File harus berbentuk image'
    ]);

    // jika file foto ada yang terupload
    if (!empty($request->foto)) {
        $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/images'), $fileName);
    } else {
        $fileName = 'nophoto.jpg';
    }

    // tambah data galeri
    DB::table('posts')->insert([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'slug' => $request->slug,
        'foto' => $fileName,
        'author_id' => $request->author_id, // Menyimpan author_id yang diinputkan
    ]);

    return redirect()->route('galeri.admin');
}


    public function edit(Post $id) {
        return view('backend.galeri.edit', compact('id'));
    }

    public function update(Request $request, string $id)
{
    $request->validate([
        'judul' => 'required|max:45',
        'deskripsi' => 'required',
        'slug' => 'required|alpha_dash|unique:galeris,slug,' . $id . '|max:50', // Validasi slug
        'author_id' => 'required|exists:users,id', // Validasi author_id
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    ],
    [
        'judul.required' => 'Judul Wajib diisi',
        'deskripsi.required' => 'Deskripsi wajib diisi',
        'slug.required' => 'Slug wajib diisi',
        'slug.alpha_dash' => 'Slug hanya boleh berisi huruf, angka, tanda hubung, atau underscore',
        'slug.unique' => 'Slug sudah ada, gunakan slug lain',
        'slug.max' => 'Slug maksimal 50 karakter',
        'author_id.required' => 'Author ID wajib diisi',
        'author_id.exists' => 'Author ID tidak valid, pastikan ID pengguna ada di database',
        'foto.max' => 'Foto maksimal 2 MB',
        'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'foto.image' => 'File harus berbentuk image'
    ]);

    // Foto lama
    $fotoLama = DB::table('galeris')->select('foto')->where('id', $id)->first();
    
    // Jika foto baru di-upload
    if (!empty($request->foto)) {
        // Hapus foto lama jika ada
        if (!empty($fotoLama->foto)) unlink(public_path('assets/images/' . $fotoLama->foto));

        // Proses ganti foto
        $fileName = 'foto-' . $id . '.' . $request->foto->extension();
        $request->foto->move(public_path('assets/images'), $fileName);
    } else {
        $fileName = $fotoLama->foto; // Jika tidak ada foto baru, tetap gunakan foto lama
    }

    // Update data galeri
    DB::table('galeris')->where('id', $id)->update([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'slug' => $request->slug,
        'author_id' => $request->author_id, // Menyimpan author_id yang diinputkan
        'foto' => $fileName,
    ]);
                
    return redirect()->route('galeri.admin');
}


    public function destroy(Post $id) {
        $id->delete();
        return redirect()->route('galeri.admin')->with('succes', 'Data berhasil dihapus');
    }
}
