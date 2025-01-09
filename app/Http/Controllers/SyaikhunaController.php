<?php

namespace App\Http\Controllers;

use App\Models\Syaikhuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('public/syaikhuna');
        }

        Syaikhuna::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return redirect()->route('syaikhuna.index');
    }

    public function edit($id)
    {
        $syaikhuna = Syaikhuna::findOrFail($id);  // Mengambil data profil berdasarkan ID
        return view('backend.syaikhuna.edit', compact('syaikhuna'));  // Mengirimkan profil ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
            'deskripsi' => 'required|string',
        ]);

        // Mencari profil berdasarkan ID
        $syaikhuna = Syaikhuna::findOrFail($id);
        
        // Jika ada foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Menghapus foto lama dari penyimpanan
            Storage::delete('public/' . $syaikhuna->foto);
            
            // Mengupload foto baru
            $fotoPath = $request->file('foto')->store('images', 'public');
            $syaikhuna->foto = $fotoPath;  // Memperbarui path foto
        }

        // Memperbarui data profil
        $syaikhuna->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('syaikhuna.admin')->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy(syaikhuna $id) {
        $id->delete();
        return redirect()->route('syaikhuna.admin')->with('succes', 'Data berhasil dihapus');
    }
}
