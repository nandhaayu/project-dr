<?php

namespace App\Http\Controllers;

use App\Models\kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    function kontakAdmin () {
        $kontak = kontak::first();
        return view('backend.kontak.index', compact('kontak'));
    }

    function create () {
        return view('backend.kontak.create');
    }

    public function store(Request $request)
{
    // melakukan validasi data
    $request->validate([
        'alamat' => 'required',
        'telepon' => 'required',
        'email' => 'required|email|max:100',
        'jam' => 'required',
        'link_maps' => 'nullable|url',
    ], [
        'alamat.required' => 'Alamat wajib diisi',
        'telepon.required' => 'Telepon wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'jam.required' => 'Jam wajib diisi',
        'link_maps.url' => 'Link maps harus berupa URL yang valid',
    ]);

    // tambah data kontak
    DB::table('kontaks')->insert([
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
        'email' => $request->email,
        'jam' => $request->jam,
        'link_maps' => $request->link_maps,
    ]);

    return redirect()->route('kontak.admin');
}


    public function edit(kontak $id) {
        return view('backend.kontak.edit', compact('id'));
    }

    public function update(Request $request, string $id)
{
    $request->validate([
        'alamat' => 'required',
        'telepon' => 'required',
        'email' => 'required|email|max:100',
        'jam' => 'required',
        'link_maps' => 'nullable|url',
    ], [
        'alamat.required' => 'Alamat wajib diisi',
        'telepon.required' => 'Telepon wajib diisi',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'jam.required' => 'Jam wajib diisi',
        'link_maps.url' => 'Link maps harus berupa URL yang valid',
    ]);

    DB::table('kontaks')->where('id', $id)->update([
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
        'email' => $request->email,
        'jam' => $request->jam,
        'link_maps' => $request->link_maps,
    ]);

    return redirect()->route('kontak.admin');
}

    public function destroy(kontak $id) {
        $id->delete();
        return redirect()->route('kontak.admin')->with('succes', 'Data berhasil dihapus');
    }
}
