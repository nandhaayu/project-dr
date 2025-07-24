<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Pendaftar;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    function galeriAdmin () {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(5);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.galeri.index', compact('galeri', 'jumlahNotifikasi', 'pendaftars'));
    }

    function create () {

        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.galeri.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:45',
            'foto.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);

        $fotoPaths = [];

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $foto) {
                $fotoPaths[] = $foto->store('galeri', 'public');
            }
        }

        DB::table('galeris')->insert([
            'judul' => $request->judul,
            'foto' => json_encode($fotoPaths), // ✅ Simpan sebagai JSON string
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('galeri.admin');
    }


    public function edit(galeri $id) {

        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.galeri.edit', compact('id', 'jumlahNotifikasi', 'pendaftars'));
    }


    public function update(Request $request, string $id)
{
    $request->validate([
        'judul' => 'required|max:45',
        'foto.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
    ], [
        'judul.required' => 'Judul wajib diisi',
        'judul.max' => 'Judul maksimal 45 karakter',
        'foto.*.max' => 'Foto maksimal 2 MB',
        'foto.*.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg,webp',
        'foto.*.image' => 'File harus berbentuk image',
    ]);

    // Ambil data galeri lama
    $galeri = DB::table('galeris')->where('id', $id)->first();
    $fotoLama = json_decode($galeri->foto, true) ?? []; // ✅ Ubah ke array

    $fotoPaths = $fotoLama;

    if ($request->hasFile('foto')) {
        // Hapus semua foto lama
        foreach ($fotoLama as $foto) {
            if (Storage::disk('public')->exists($foto)) {
                Storage::disk('public')->delete($foto);
            }
        }

        // Simpan foto baru
        $fotoPaths = [];
        foreach ($request->file('foto') as $foto) {
            $fotoPaths[] = $foto->store('galeri', 'public');
        }
    }

    DB::table('galeris')->where('id', $id)->update([
        'judul' => $request->judul,
        'foto' => json_encode($fotoPaths), // ✅ Simpan sebagai JSON array
        'updated_at' => now(),
    ]);

    return redirect()->route('galeri.admin')->with('success', 'Galeri berhasil diperbarui');
}

    public function destroy(galeri $id) {
        $id->delete();
        return redirect()->route('galeri.admin')->with('succes', 'Data berhasil dihapus');
    }
}
