<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use App\Exports\SantrisExport;
use App\Models\Pendaftar;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;


class SantriController extends Controller
{
    public function index()
    {
        // Ambil semua data santri, bisa ditambah pagination jika banyak data
        $santris = Santri::orderBy('nama')->get();
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        // Kirim ke view santris.index (sesuaikan nama file blade)
        return view('backend.santri.index', compact('santris', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function create()
    {
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.santri.create', compact('jumlahNotifikasi', 'pendaftars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:santris',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:L,P',
            'nama_orangtua' => 'required|string|max:255',
            'kurikulum' => 'required|string|max:255',
            'alamat' => 'required|string',
            'harapan' => 'nullable|string',
            'akte' => 'required|file|mimes:pdf|max:2048',
            'kk' => 'required|file|mimes:pdf|max:2048',
            'tanggal_masuk' => 'required|date',
        ]);

        // Upload file ke storage/app/public/santri/
        $aktePath = $request->file('akte')->store('santri/akte', 'public');
        $kkPath = $request->file('kk')->store('santri/kk', 'public');

        // Simpan data ke database
        Santri::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nama_orangtua' => $request->nama_orangtua,
            'kurikulum' => $request->kurikulum,
            'alamat' => $request->alamat,
            'harapan' => $request->harapan,
            'akte' => $aktePath,
            'kk' => $kkPath,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('santris.index')->with('success', 'Santri berhasil ditambahkan');
    }

    // Tambahan method show kalau mau detail
    public function show($id)
    {
        $santri = Santri::findOrFail($id);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.santri.show', compact('santri', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        return view('backend.santri.edit', compact('santri', 'jumlahNotifikasi', 'pendaftars'));
    }

    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);
        $santri->update($request->all());
        return redirect()->route('santris.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        Santri::findOrFail($id)->delete();
        return redirect()->route('santris.index')->with('success', 'Data berhasil dihapus.');
    }

    public function exportExcel()
    {
        return Excel::download(new SantrisExport, 'data-santri.xlsx');
    }

    public function generateAllPdf()
    {
        $santris = Santri::orderBy('nama')->get();

        // Logo base64
        $logoPath = public_path('assets/img/logo-PPDR.png');
        $logoDataUri = false;

        if (file_exists($logoPath)) {
            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
            $data = file_get_contents($logoPath);
            $logoDataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        // Generate PDF view
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('backend.santri.pdf', [
            'santris' => $santris,
            'logoPath' => $logoDataUri,
        ])->setPaper('A4', 'landscape'); // optional: landscape

        return $pdf->stream('data-santri.pdf');
    }
}
