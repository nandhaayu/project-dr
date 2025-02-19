<?php

namespace App\Http\Controllers;

use App\Models\Syaikhuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SyaikhunaController extends Controller
{
    function syaikhunaAdmin() {
        $syaikhuna = Syaikhuna::all(); // Mengambil semua data
        return view('backend.syaikhuna.index', compact('syaikhuna'));
    }

    function create() {
        return view('backend.syaikhuna.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('syaikhuna', 'public');
        }

        Syaikhuna::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'foto' => $foto,
        ]);

        return redirect()->route('syaikhuna.admin')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $syaikhuna = Syaikhuna::findOrFail($id);
        return view('backend.syaikhuna.edit', compact('syaikhuna'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'nama' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $syaikhuna = Syaikhuna::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($syaikhuna->foto) {
                Storage::disk('public')->delete($syaikhuna->foto);
            }
            $syaikhuna->foto = $request->file('foto')->store('syaikhuna', 'public');
        }

        $syaikhuna->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'nama' => $request->nama,
            'foto' => $syaikhuna->foto,
        ]);

        return redirect()->route('syaikhuna.admin')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Syaikhuna $syaikhuna)
    {
        if ($syaikhuna->foto) {
            Storage::disk('public')->delete($syaikhuna->foto);
        }
        
        $syaikhuna->delete();
        return redirect()->route('syaikhuna.admin')->with('success', 'Data berhasil dihapus');
    }
}
