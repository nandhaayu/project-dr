<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    // Menyimpan slide baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);

        // Mengupload foto dan menyimpan path
        $fotoPath = $request->file('foto')->store('images', 'public');

        if (!$fotoPath) {
            return back()->withErrors(['foto' => 'Gagal mengunggah gambar']);
        }

        Slide::create([
            'foto' => $fotoPath,
        ]);

        return redirect()->route('slide.admin')->with('success', 'Slide berhasil dibuat');
    }

    // Memperbarui slide
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);

        $slide = Slide::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Menghapus foto lama jika ada
            if ($slide->foto && Storage::exists('public/' . $slide->foto)) {
                Storage::delete('public/' . $slide->foto);
            }

            // Mengupload foto baru
            $fotoPath = $request->file('foto')->store('images', 'public');

            if (!$fotoPath) {
                return back()->withErrors(['foto' => 'Gagal mengunggah gambar']);
            }

            $slide->foto = $fotoPath;
        }

        $slide->save();

        return redirect()->route('slide.admin')->with('success', 'Slide berhasil diperbarui');
    }

    // Menampilkan semua slide di halaman admin
    public function slideAdmin()
    {
        $slide = Slide::all();  
        return view('backend.slide.index', compact('slide'));
    }

    // Menampilkan form tambah slide
    public function create()
    {
        return view('backend.slide.create');
    }

    // Menampilkan form edit slide
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);  
        return view('backend.slide.edit', compact('slide'));
    }

    // Menghapus slide
    public function destroy(Slide $slide)
    {
        // Menghapus foto dari penyimpanan jika ada
        if ($slide->foto && Storage::exists('public/' . $slide->foto)) {
            Storage::delete('public/' . $slide->foto);
        }

        $slide->delete();

        return redirect()->route('slide.admin')->with('success', 'Slide berhasil dihapus');
    }
}
