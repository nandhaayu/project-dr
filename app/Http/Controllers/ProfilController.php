<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    // Menyimpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
            'deskripsi' => 'required|string',
        ]);

        // Mengupload foto dan menyimpan path
        $fotoPath = $request->file('foto')->store('images', 'public');

        // Membuat data profil baru
        Profil::create([
            'judul' => $request->judul,
            'foto' => $fotoPath,  // Menyimpan path foto
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('profil.admin')->with('success', 'Profil berhasil dibuat');
    }

    // Mengupdate profil
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
            'deskripsi' => 'required|string',
        ]);

        // Mencari profil berdasarkan ID
        $profil = Profil::findOrFail($id);
        
        // Jika ada foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Menghapus foto lama dari penyimpanan
            Storage::delete('public/' . $profil->foto);
            
            // Mengupload foto baru
            $fotoPath = $request->file('foto')->store('images', 'public');
            $profil->foto = $fotoPath;  // Memperbarui path foto
        }

        // Memperbarui data profil
        $profil->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('profil.admin')->with('success', 'Profil berhasil diperbarui');
    }

    // Menampilkan profil di halaman admin
    public function profilAdmin()
    {
        $profil = Profil::first();  // Mengambil profil pertama
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.profil.index', compact('profil', 'jumlahNotifikasi', 'pendaftars'));
    }

    // Menampilkan form untuk membuat profil baru
    public function create()
    {
        return view('backend.profil.create');
    }

    public function edit($id)
    {
        $profil = Profil::findOrFail($id);  // Mengambil data profil berdasarkan ID
        return view('backend.profil.edit', compact('profil'));  // Mengirimkan profil ke view
    }
    

    // Menghapus profil
    public function destroy(Profil $id)
    {
        // Menghapus foto dari penyimpanan
        Storage::delete('public/' . $id->foto);
        
        // Menghapus data profil
        $id->delete();

        return redirect()->route('profil.admin')->with('success', 'Data berhasil dihapus');
    }
}
