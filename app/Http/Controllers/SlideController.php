<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    // Menyimpan profil baru
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk foto
        ]);

        // Mengupload foto dan menyimpan path
        $fotoPath = $request->file('foto')->store('images', 'public');

        Slide::create([
            'foto' => $fotoPath,  // Menyimpan path foto
        ]);

        return redirect()->route('slide.admin')->with('success', 'slide berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi untuk file gambar
        ]);

        // Mencari slide berdasarkan ID
        $slide = Slide::findOrFail($id);

        // Jika ada file foto yang diunggah
        if ($request->hasFile('foto')) {
            // Menghapus foto lama dari penyimpanan jika ada
            if (!empty($slide->foto) && Storage::exists('public/' . $slide->foto)) {
                Storage::delete('public/' . $slide->foto);
            }

            // Mengunggah foto baru
            $fotoPath = $request->file('foto')->store('images', 'public');
            $slide->foto = $fotoPath;  // Memperbarui path foto di database
        }

        // Menyimpan perubahan ke database
        $slide->save();

        // Redirect dengan pesan sukses
        return redirect()->route('slide.admin')->with('success', 'Slide berhasil diperbarui');
    }

    // Menampilkan profil di halaman admin
    public function slideAdmin()
    {
        $slide = Slide::all();  // Mengambil profil pertama
        return view('backend.slide.index', compact('slide'));
    }

    // Menampilkan form untuk membuat profil baru
    public function create()
    {
        return view('backend.slide.create');
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);  // Mengambil data profil berdasarkan ID
        return view('backend.slide.edit', compact('slide'));  // Mengirimkan profil ke view
    }
    

    // Menghapus profil
    public function destroy(Slide $id)
    {
        // Menghapus foto dari penyimpanan
        Storage::delete('public/' . $id->foto);
        
        // Menghapus data profil
        $id->delete();

        return redirect()->route('slide.admin')->with('success', 'Data berhasil dihapus');
    }
}
