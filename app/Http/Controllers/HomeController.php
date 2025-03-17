<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\BiografiSyaikhuna;
use App\Models\Galeri;
use App\Models\kontak;
use App\Models\Kurikulum;
use App\Models\Pendaftaran;
use App\Models\Post;
use App\Models\Profil;
use App\Models\Rutinitas;
use App\Models\RutinitasUmum;
use App\Models\Slide;
use App\Models\Syaikhuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function beranda () {
        $profil = Profil::first();
        $syaikhuna = Syaikhuna::first();
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        $slide = Slide::all();
        $beranda = Beranda::first();
        return view('home', compact('profil', 'posts', 'syaikhuna', 'slide', 'beranda'));
    }
    public function profil () {
        $profil = Profil::first();
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
    public function rutinitasUmum () {
        $rutinitas = RutinitasUmum::all();
        return view('rutinitasUmum', compact('rutinitas'));
    }
    public function syaikhuna () {
        $syaikhuna = Syaikhuna::all();
        return view('syaikhuna', compact('syaikhuna'));
    }
    public function biografiSyaikhuna () {
        $syaikhuna = BiografiSyaikhuna::all();
        return view('biografiSyaikhuna', compact('syaikhuna'));
    }
    public function pendaftaran () {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran', compact('pendaftaran'));
    }
    public function download($id)
    {
        // Ambil data file berdasarkan ID
        $pendaftaran = DB::table('pendaftarans')->where('id', $id)->first();

        // Pastikan file ada
        if ($pendaftaran && $pendaftaran->file) {
            $filePath = public_path('storage/pendaftaran/files/' . $pendaftaran->file);
            
            // Pastikan file ada di dalam server
            if (file_exists($filePath)) {
                return response()->download($filePath, $pendaftaran->file); // Menggunakan nama file asli
            }
        }

        // Jika file tidak ditemukan, tampilkan error 404
        abort(404, 'File tidak ditemukan');
    }
    public function artikel() {
        $post = Post::orderBy('created_at', 'desc')->paginate(6);
        return view('artikel', compact('post'));
    }
    public function galeri() {
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(6);
        return view('galeri', compact('galeri'));
    }
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('galeriSingle', compact('post', 'posts'));
    }
    public function kontak () {
        $kontak = kontak::first();
        return view('kontak', compact('kontak'));
    }

}
