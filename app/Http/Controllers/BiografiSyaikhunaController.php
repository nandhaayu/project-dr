<?php

namespace App\Http\Controllers;

use App\Models\BiografiSyaikhuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiografiSyaikhunaController extends Controller
{
    function biografiSyaikhunaAdmin () {
        $syaikhuna = BiografiSyaikhuna::first();
        return view('backend.biografiSyaikhuna.index', compact('syaikhuna'));
    }

    function create () {
        return view('backend.biografiSyaikhuna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cek apakah ada file yang diupload
        $foto = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName(); // Nama unik
            $foto = $file->storeAs('syaikhuna', $filename, 'public'); // Simpan di storage/app/public/syaikhuna
        }

        BiografiSyaikhuna::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto, // Hanya 'syaikhuna/nama_file.jpg', tanpa 'storage/'
        ]);
        

        return redirect()->route('biografi.syaikhuna.admin')->with('success', 'Biografi berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $syaikhuna = BiografiSyaikhuna::findOrFail($id);  // Mengambil data profil berdasarkan ID
        return view('backend.biografiSyaikhuna.edit', compact('syaikhuna'));  // Mengirimkan profil ke view
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
            'deskripsi' => 'required|string',
        ]);

        // Mencari profil berdasarkan ID
        $syaikhuna = BiografiSyaikhuna::findOrFail($id);
        
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

        return redirect()->route('biografi.syaikhuna.admin')->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy(BiografiSyaikhuna $id) {
        $id->delete();
        return redirect()->route('biografi.syaikhuna.admin')->with('succes', 'Data berhasil dihapus');
    }
}
