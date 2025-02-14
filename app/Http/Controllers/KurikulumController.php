<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumController extends Controller
{
    public function kurikulumAdmin() {
        $kurikulum = Kurikulum::all();
        return view('backend.kurikulum.index', compact('kurikulum'));
    }

    public function create() {
        return view('backend.kurikulum.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'judul.max' => 'Judul maksimal 45 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        // Proses unggah foto
        $fileName = 'nophoto.jpg';
        if ($request->hasFile('foto')) {
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/images'), $fileName);
        }
        
        // Simpan data ke database
        Kurikulum::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
        ]);
        
        return redirect()->route('kurikulum.admin')->with('success', 'Kurikulum berhasil ditambahkan');
    }

    public function edit(Kurikulum $kurikulum) {
        return view('backend.kurikulum.edit', compact('kurikulum'));
    }

    public function update(Request $request, Kurikulum $kurikulum)
    {
        $request->validate([
            'judul' => 'required|max:45',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Proses unggah foto
        $fileName = $kurikulum->foto;
        if ($request->hasFile('foto')) {
            if ($kurikulum->foto && $kurikulum->foto !== 'nophoto.jpg' && file_exists(public_path('assets/images/' . $kurikulum->foto))) {
                unlink(public_path('assets/images/' . $kurikulum->foto));
            }
            $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/images'), $fileName);
        }

        // Update data
        $kurikulum->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $fileName,
        ]);

        return redirect()->route('kurikulum.admin')->with('success', 'Kurikulum berhasil diperbarui');
    }

    public function destroy(Kurikulum $kurikulum) {
        if ($kurikulum->foto && $kurikulum->foto !== 'nophoto.jpg' && file_exists(public_path('assets/images/' . $kurikulum->foto))) {
            unlink(public_path('assets/images/' . $kurikulum->foto));
        }
        $kurikulum->delete();

        return redirect()->route('kurikulum.admin')->with('success', 'Data berhasil dihapus');
    }
}
