<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class SlideController extends Controller
{
    // Fungsi untuk optimasi gambar
    protected function optimizeImage(string $path)
    {
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($path);
    }

    // Menyimpan slide baru
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $foto = $request->file('foto');
        $fotoPath = $foto->store('images', 'public');

        if (!$fotoPath) {
            return back()->withErrors(['foto' => 'Gagal mengunggah gambar']);
        }

        // Optimasi gambar
        $this->optimizeImage(public_path('storage/' . $fotoPath));

        Slide::create([
            'foto' => $fotoPath,
        ]);

        return redirect()->route('slide.admin')->with('success', 'Slide berhasil dibuat');
    }

    // Memperbarui slide
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $slide = Slide::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($slide->foto && Storage::exists('public/' . $slide->foto)) {
                Storage::delete('public/' . $slide->foto);
            }

            $foto = $request->file('foto');
            $fotoPath = $foto->store('images', 'public');

            if (!$fotoPath) {
                return back()->withErrors(['foto' => 'Gagal mengunggah gambar']);
            }

            // Optimasi gambar baru
            $this->optimizeImage(public_path('storage/' . $fotoPath));

            $slide->foto = $fotoPath;
        }

        $slide->save();

        return redirect()->route('slide.admin')->with('success', 'Slide berhasil diperbarui');
    }

    // Menampilkan semua slide di halaman admin
    public function slideAdmin()
    {
        $slide = Slide::all();
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.slide.index', compact('slide', 'pendaftars', 'jumlahNotifikasi'));
    }

    // Menampilkan form tambah slide
    public function create()
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.slide.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    // Menampilkan form edit slide
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.slide.edit', compact('slide', 'jumlahNotifikasi', 'pendaftars'));
    }

    // Menghapus slide
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        // Hapus file gambar dari storage
        if ($slide->foto && Storage::exists('public/' . $slide->foto)) {
            Storage::delete('public/' . $slide->foto);
        }

        $slide->delete();

        return redirect()->route('slide.admin')->with('success', 'Slide berhasil dihapus');
    }
}
