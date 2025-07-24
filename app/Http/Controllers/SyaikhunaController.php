<?php
namespace App\Http\Controllers;

use App\Models\Pendaftar;
use App\Models\Syaikhuna;
use Illuminate\Http\Request;

class SyaikhunaController extends Controller
{
    public function syaikhunaAdmin()
    {
        $syaikhuna = Syaikhuna::with('media')->get(); // include media Spatie
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.syaikhuna.index', compact('syaikhuna', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function create()
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.syaikhuna.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $syaikhuna = Syaikhuna::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
        ]);

        if ($request->hasFile('foto')) {
            $syaikhuna
                ->addMediaFromRequest('foto')
                ->toMediaCollection('foto_syaikhuna');
        }

        return redirect()->route('syaikhuna.admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $syaikhuna = Syaikhuna::findOrFail($id);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::latest()->get();

        return view('backend.syaikhuna.edit', compact('syaikhuna', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $syaikhuna = Syaikhuna::findOrFail($id);

        $syaikhuna->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
        ]);

        if ($request->hasFile('foto')) {
            $syaikhuna->clearMediaCollection('foto_syaikhuna');
            $syaikhuna
                ->addMediaFromRequest('foto')
                ->toMediaCollection('foto_syaikhuna');
        }

        return redirect()->route('syaikhuna.admin')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Syaikhuna $syaikhuna)
    {
        $syaikhuna->clearMediaCollection('foto_syaikhuna');
        $syaikhuna->delete();

        return redirect()->route('syaikhuna.admin')->with('success', 'Data berhasil dihapus');
    }
}
