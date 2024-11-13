<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Pendaftaran;
use App\Models\Post;
use App\Models\Profil;
use App\Models\Rutinitas;
use App\Models\Syaikhuna;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function profil () {
        $profil = Profil::all();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('profil', compact('profil', 'posts'));
    }
    public function kurikulum () {
        $kurikulum = Kurikulum::all();
        return view('kurikulum', compact('kurikulum'));
    }
    public function rutinitas () {
        $rutinitas = Rutinitas::all();
        return view('rutinitas', compact('rutinitas'));
    }
    public function syaikhuna () {
        $syaikhuna = Syaikhuna::all();
        return view('syaikhuna', compact('syaikhuna'));
    }
    public function pendaftaran () {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran', compact('pendaftaran'));
    }
    public function download(Pendaftaran $file)
    {
        // Tentukan path file yang akan diunduh berdasarkan nama file yang ada di database
        $filePath = public_path('assets/files/' . $file->file);
    
        // Pastikan file ada di dalam server
        if (file_exists($filePath)) {
            // Jika file ada, kembalikan response untuk mendownload file
            return response()->download($filePath, $file->file); // Nama asli file
        } else {
            // Jika file tidak ditemukan, kembalikan error 404
            abort(404, 'File not found');
        }
    }
    public function galeri() {
        $post = Post::orderBy('created_at', 'desc')->get();
        return view('galeri', compact('post'));
    }
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('galeriSingle', compact('post', 'posts'));
    }

}
