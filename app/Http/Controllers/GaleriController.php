<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Pendaftar;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function galeriAdmin()
    {
        $galeri = Galeri::latest()->paginate(5);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.galeri.index', compact('galeri', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function create()
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.galeri.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:45',
            'foto.*' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);

        $galeri = Galeri::create([
            'judul' => $request->judul,
        ]);

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $image) {
                $galeri->addMedia($image)->toMediaCollection('foto');
            }
        }

        return redirect()->route('galeri.admin')->with('success', 'Galeri berhasil ditambahkan');
    }

    public function edit(Galeri $id)
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.galeri.edit', [
            'id' => $id,
            'jumlahNotifikasi' => $jumlahNotifikasi,
            'pendaftars' => $pendaftars
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:45',
            'foto.*' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->update(['judul' => $request->judul]);

        if ($request->hasFile('foto')) {
            // Hapus media lama
            $galeri->clearMediaCollection('foto');

            // Upload baru
            foreach ($request->file('foto') as $image) {
                $galeri->addMedia($image)->toMediaCollection('foto');
            }
        }

        return redirect()->route('galeri.admin')->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy(Galeri $id)
    {
        $id->clearMediaCollection('foto'); // hapus file dari storage
        $id->delete(); // hapus dari database

        return redirect()->route('galeri.admin')->with('success', 'Galeri berhasil dihapus');
    }
}
