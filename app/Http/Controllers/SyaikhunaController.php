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
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_1' => 'required|string|max:255',
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = null;
        $foto_1 = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('syaikhuna', 'public');
        }
        
        if ($request->hasFile('foto_1')) {
            $foto_1 = $request->file('foto_1')->store('syaikhuna', 'public');
        }    

        Syaikhuna::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'foto' => $foto,
            'nama_1' => $request->nama_1,
            'foto_1' => $foto_1,
        ]);

        return redirect()->route('syaikhuna.admin');
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
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'foto_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
        ]);

        // Mencari data berdasarkan ID
        $syaikhuna = Syaikhuna::findOrFail($id);

        // Jika ada foto baru yang diupload
        if ($request->hasFile('foto')) {
            // Menghapus foto lama dari penyimpanan jika ada
            if ($syaikhuna->foto) {
                Storage::disk('public')->delete($syaikhuna->foto);
            }
            // Mengupload foto baru
            $fotoPath = $request->file('foto')->store('syaikhuna', 'public'); // Simpan tanpa 'public/'
            $syaikhuna->foto = $fotoPath;
        }

        // Jika ada foto_1 baru yang diupload
        if ($request->hasFile('foto_1')) {
            // Menghapus foto_1 lama dari penyimpanan jika ada
            if ($syaikhuna->foto_1) {
                Storage::disk('public')->delete($syaikhuna->foto_1);
            }
            // Mengupload foto_1 baru
            $foto1Path = $request->file('foto_1')->store('syaikhuna', 'public'); // Simpan tanpa 'public/'
            $syaikhuna->foto_1 = $foto1Path;
        }

        // Memperbarui data
        $syaikhuna->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'foto' => $syaikhuna->foto,
            'nama_1' => $request->nama_1,
            'foto_1' => $syaikhuna->foto_1,
        ]);

        return redirect()->route('syaikhuna.admin')->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy(syaikhuna $id) {
        $id->delete();
        return redirect()->route('syaikhuna.admin')->with('succes', 'Data berhasil dihapus');
    }
}
