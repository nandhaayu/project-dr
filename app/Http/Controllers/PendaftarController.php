<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF;

class PendaftarController extends Controller
{
    // Simpan data pendaftar
    public function store(Request $request)
    {
        $request->validate([
            'nama'            => 'required',
            'nik'             => 'required|unique:pendaftars',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required|date',
            'no_hp'           => 'required',
            'jenis_kelamin'   => 'required|in:L,P',
            'nama_orangtua'   => 'required',
            'kurikulum'       => 'required',
            'alamat'          => 'required',
            'harapan'         => 'nullable',
            'akte'            => 'required|file|mimes:pdf|max:2048',
            'kk'              => 'required|file|mimes:pdf|max:2048',
        ]);

        // Upload file PDF
        $akte = $request->file('akte')->store('berkas/akte', 'public');
        $kk   = $request->file('kk')->store('berkas/kk', 'public');

        // Simpan ke database
        $pendaftar = Pendaftar::create([
            ...$request->except(['akte', 'kk']),
            'akte'  => $akte,
            'kk'    => $kk,
            'status' => 'pending',
        ]);

        return redirect()->route('pendaftars.pdf', $pendaftar->id)
            ->with('success', 'Pendaftaran berhasil. Silakan unduh bukti pendaftaran.');
    }

    public function show($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        return view('backend.pendaftar.show', compact('pendaftar'));
    }

    public function tolak($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);
        $pendaftar->status = 'tolak';
        $pendaftar->save();

        return redirect()->route('pendaftars.index')->with('success', 'Pendaftar ditolak.');
    }

    // Generate PDF dari detail pendaftar
    public function generatePdf($id)
    {
        $pendaftar = Pendaftar::findOrFail($id);

        // Logo base64 untuk inline PDF
        $logoPath = public_path('assets/img/logo-PPDR.png');
        $logoDataUri = false;

        if (file_exists($logoPath)) {
            $type = pathinfo($logoPath, PATHINFO_EXTENSION);
            $data = file_get_contents($logoPath);
            $logoDataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
        }

        // Render PDF
        $pdf = FacadePdf::loadView('pendaftars.pdf', [
            'pendaftar' => $pendaftar,
            'logoPath'  => $logoDataUri,
        ]);

        return $pdf->stream('bukti-pendaftaran-' . $pendaftar->nama . '.pdf');
    }

    public function acc(Pendaftar $pendaftar)
{
    // Pastikan belum di-ACC
    if ($pendaftar->status == 'acc') {
        return redirect()->back()->with('info', 'Pendaftar sudah di-ACC.');
    }

    // Pindahkan data ke tabel santri
    \App\Models\Santri::create([
        'pendaftar_id'   => $pendaftar->id,  // <-- tambah ini
        'nama' => $pendaftar->nama,
        'nik' => $pendaftar->nik,
        'tempat_lahir' => $pendaftar->tempat_lahir,
        'tanggal_lahir' => $pendaftar->tanggal_lahir,
        'no_hp' => $pendaftar->no_hp,
        'jenis_kelamin' => $pendaftar->jenis_kelamin,
        'nama_orangtua' => $pendaftar->nama_orangtua,
        'kurikulum' => $pendaftar->kurikulum,
        'alamat' => $pendaftar->alamat,
        'harapan' => $pendaftar->alamat,
        'akte' => $pendaftar->akte,
        'kk' => $pendaftar->kk,
        // Tambahkan kolom lain sesuai kebutuhan
    ]);

    // Update status pendaftar jadi approved
    $pendaftar->update(['status' => 'acc']);

    return redirect()->back()->with('success', 'Pendaftar berhasil di-ACC dan dipindahkan ke data santri.');
}

    public function index()
    {
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        return view('backend.pendaftar.index', compact('pendaftars', 'jumlahNotifikasi'));
    }

    // Update data pendaftar
    public function update(Request $request, Pendaftar $pendaftar)
    {
        $request->validate([
            'nama'            => 'required',
            'nik'             => 'required|unique:pendaftars,nik,' . $pendaftar->id,
            'akte'            => 'nullable|file|mimes:pdf|max:2048',
            'kk'              => 'nullable|file|mimes:pdf|max:2048',
            // Tambahkan validasi lain jika diperlukan
        ]);

        $data = $request->except(['akte', 'kk']);

        if ($request->hasFile('akte')) {
            $data['akte'] = $request->file('akte')->store('berkas/akte', 'public');
        }

        if ($request->hasFile('kk')) {
            $data['kk'] = $request->file('kk')->store('berkas/kk', 'public');
        }

        $pendaftar->update($data);

        return redirect()->route('pendaftars.index')
            ->with('success', 'Data pendaftar berhasil diperbarui.');
    }
}
