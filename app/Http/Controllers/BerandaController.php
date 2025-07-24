<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;

class BerandaController extends Controller
{
    protected function optimizeImage(string $path)
    {
        $optimizerChain = OptimizerChainFactory::create();
        $optimizerChain->optimize($path);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'required|string',
        ]);

        // Upload foto
        $foto = $request->file('foto');
        $fotoPath = $foto->store('images', 'public');

        // Optimasi gambar
        $this->optimizeImage(public_path('storage/' . $fotoPath));

        // Simpan ke DB
        Beranda::create([
            'foto' => $fotoPath,
            'link' => $request->link,
        ]);

        return redirect()->route('beranda.admin')->with('success', 'Beranda berhasil dibuat');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link' => 'required|string',
        ]);

        $beranda = Beranda::findOrFail($id);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            Storage::delete('public/' . $beranda->foto);

            // Upload dan optimasi foto baru
            $foto = $request->file('foto');
            $fotoPath = $foto->store('images', 'public');
            $this->optimizeImage(public_path('storage/' . $fotoPath));

            $beranda->foto = $fotoPath;
        }

        // Update data
        $beranda->update([
            'foto' => $beranda->foto,
            'link' => $request->link,
        ]);

        return redirect()->route('beranda.admin')->with('success', 'Beranda berhasil diperbarui');
    }

    public function destroy(Beranda $id)
    {
        Storage::delete('public/' . $id->foto);
        $id->delete();

        return redirect()->route('beranda.admin')->with('success', 'Data berhasil dihapus');
    }

    public function berandaAdmin()
    {
        $beranda = Beranda::first();
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.beranda.index', compact('beranda', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function create()
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.beranda.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    public function edit($id)
    {
        $beranda = Beranda::findOrFail($id);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.beranda.edit', compact('beranda', 'jumlahNotifikasi', 'pendaftars'));
    }
}
