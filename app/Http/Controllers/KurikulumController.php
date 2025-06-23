<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Pendaftar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KurikulumController extends Controller
{
    public function kurikulumAdmin() {
        $kurikulum = Kurikulum::all();
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.kurikulum.index', compact('kurikulum', 'jumlahNotifikasi', 'pendaftars'));
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
        $foto = 'nophoto.jpg';
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('kurikulum', 'public');
        }
        
        // Simpan data ke database
        Kurikulum::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
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
        $foto = $kurikulum->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('kurikulum', 'public');
        }

        // Update data
        $kurikulum->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return redirect()->route('kurikulum.admin')->with('success', 'Kurikulum berhasil diperbarui');
    }

    public function destroy(Kurikulum $kurikulum) {
        if ($kurikulum->foto && $kurikulum->foto !== 'nophoto.jpg' && file_exists(storage_path('app/public/' . $kurikulum->foto))) {
            unlink(storage_path('app/public/' . $kurikulum->foto));
        }
        $kurikulum->delete();

        return redirect()->route('kurikulum.admin')->with('success', 'Data berhasil dihapus');
    }
}
