<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
        // Menyimpan beranda baru
        public function store(Request $request)
        {
            $request->validate([
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
                'link' => 'required|string',
            ]);
    
            // Mengupload foto dan menyimpan path
            $fotoPath = $request->file('foto')->store('images', 'public');
    
            // Membuat data profil baru
            Beranda::create([
                'foto' => $fotoPath,  // Menyimpan path foto
                'link' => $request->link,
            ]);
    
            return redirect()->route('beranda.admin')->with('success', 'beranda berhasil dibuat');
        }
    
        // Mengupdate profil
        public function update(Request $request, $id)
        {
            $request->validate([
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
                'link' => 'required|string',
            ]);
    
            // Mencari profil berdasarkan ID
            $beranda = Beranda::findOrFail($id);
            
            // Jika ada foto baru yang diupload
            if ($request->hasFile('foto')) {
                // Menghapus foto lama dari penyimpanan
                Storage::delete('public/' . $beranda->foto);
                
                // Mengupload foto baru
                $fotoPath = $request->file('foto')->store('images', 'public');
                $beranda->foto = $fotoPath;  // Memperbarui path foto
            }
    
            // Memperbarui data profil
            $beranda->update([
                'link' => $request->link,
                'link' => $request->link,
            ]);
    
            return redirect()->route('beranda.admin')->with('success', 'beranda berhasil diperbarui');
        }
    
        // Menampilkan profil di halaman admin
        public function berandaAdmin()
        {
            $beranda = Beranda::first();  // Mengambil beranda pertama
            return view('backend.beranda.index', compact('beranda'));
        }
    
        // Menampilkan form untuk membuat profil baru
        public function create()
        {
            return view('backend.beranda.create');
        }
    
        public function edit($id)
        {
            $beranda = Beranda::findOrFail($id);  // Mengambil data beranda berdasarkan ID
            return view('backend.beranda.edit', compact('beranda'));  // Mengirimkan beranda ke view
        }
        
    
        // Menghapus profil
        public function destroy(Beranda $id)
        {
            // Menghapus foto dari penyimpanan
            Storage::delete('public/' . $id->foto);
            
            // Menghapus data profil
            $id->delete();
    
            return redirect()->route('beranda.admin')->with('success', 'Data berhasil dihapus');
        }
}
