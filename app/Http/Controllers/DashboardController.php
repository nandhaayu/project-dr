<?php

namespace App\Http\Controllers;

use App\Models\Pendaftar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Hitung jumlah pendaftar yang statusnya pending
        $jumlahNotifikasi = Pendaftar::where('status', 'pending')->count();
        $pendaftars = Pendaftar::orderBy('created_at', 'desc')->get();

        // Ambil 5 pendaftar terbaru yang statusnya pending (untuk dropdown)
        $notifikasiPendaftar = Pendaftar::where('status', 'pending')
            ->latest()
            ->take(5)
            ->get();

        return view('backend.index', compact('jumlahNotifikasi', 'notifikasiPendaftar', 'pendaftars'));
    }
}
