<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BiografiSyaikhunaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RutinitasController;
use App\Http\Controllers\RutinitasUmumController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SyaikhunaController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


//ROUTE FRONTEND

// Route::get('/', function () {
//     return view('home', ['title' => 'Beranda']);
// });
Route::get('/',[HomeController::class, 'beranda'])->name('beranda');
Route::get('/profil',[HomeController::class, 'profil'])->name('profil');
Route::get('/kurikulum',[HomeController::class, 'kurikulum'])->name('kurikulum');
Route::get('/rutinitas',[HomeController::class, 'rutinitas'])->name('rutinitas');
Route::get('/rutinitasUmum',[HomeController::class, 'rutinitasUmum'])->name('rutinitas.umum');
Route::get('/syaikhuna',[HomeController::class, 'syaikhuna'])->name('syaikhuna');
Route::get('/BiografiSyaikhuna',[HomeController::class, 'biografiSyaikhuna'])->name('biografi.syaikhuna');
Route::get('/pendaftaran',[HomeController::class, 'pendaftaran'])->name('pendaftaran');
Route::get('/pendaftaranAdmin/{file}/download', [HomeController::class, 'download'])->name('pendaftaran.download');
Route::get('/pendaftaran',[HomeController::class, 'pendaftaran'])->name('pendaftaran');
Route::get('/galeri',[HomeController::class, 'galeri'])->name('galeri');
Route::get('/galeri/{id}', [HomeController::class, 'show'])->name('show.singlePost');
Route::get('/kontak',[HomeController::class, 'kontak'])->name('kontak');
Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::get('/beranda', function () {
    return view('beranda');
});


Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi.tampil');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');
Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

//ROUTE BACKEND
Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profilAdmin', [ProfilController::class, 'profilAdmin'])->name('profil.admin');
    Route::get('/profilAdmin/create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('/profilAdmin/store', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('/profilAdmin/edit/{id}', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('/profilAdmin/update/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profilAdmin/delete/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');
    Route::get('/kurikulumAdmin', [KurikulumController::class, 'kurikulumAdmin'])->name('kurikulum.admin');
    Route::get('/kurikulumAdmin/create', [KurikulumController::class, 'create'])->name('kurikulum.create');
    Route::post('/kurikulumAdmin/store', [KurikulumController::class, 'store'])->name('kurikulum.store');
    Route::get('/kurikulumAdmin/edit/{id}', [KurikulumController::class, 'edit'])->name('kurikulum.edit');
    Route::put('/kurikulumAdmin/update/{id}', [KurikulumController::class, 'update'])->name('kurikulum.update');
    Route::delete('/kurikulumAdmin/delete/{id}', [KurikulumController::class, 'destroy'])->name('kurikulum.destroy');
    Route::get('/rutinitasAdmin', [RutinitasController::class, 'rutinitasAdmin'])->name('rutinitas.admin');
    Route::get('/rutinitasAdmin/create', [RutinitasController::class, 'create'])->name('rutinitas.create');
    Route::post('/rutinitasAdmin/store', [RutinitasController::class, 'store'])->name('rutinitas.store');
    Route::get('/rutinitasAdmin/edit/{id}', [RutinitasController::class, 'edit'])->name('rutinitas.edit');
    Route::put('/rutinitasAdmin/update/{id}', [RutinitasController::class, 'update'])->name('rutinitas.update');
    Route::delete('/rutinitasAdmin/delete/{id}', [RutinitasController::class, 'destroy'])->name('rutinitas.destroy');
    Route::get('/rutinitasUmumAdmin', [RutinitasUmumController::class, 'rutinitasUmumAdmin'])->name('rutinitas.umum.admin');
    Route::get('/rutinitasUmumAdmin/create', [RutinitasUmumController::class, 'create'])->name('rutinitas.umum.create');
    Route::post('/rutinitasUmumAdmin/store', [RutinitasUmumController::class, 'store'])->name('rutinitas.umum.store');
    Route::get('/rutinitasUmumAdmin/edit/{id}', [RutinitasUmumController::class, 'edit'])->name('rutinitas.umum.edit');
    Route::put('/rutinitasUmumAdmin/update/{id}', [RutinitasUmumController::class, 'update'])->name('rutinitas.umum.update');
    Route::delete('/rutinitasUmumAdmin/delete/{id}', [RutinitasUmumController::class, 'destroy'])->name('rutinitas.umum.destroy');
    Route::get('/syaikhunaAdmin', [SyaikhunaController::class, 'syaikhunaAdmin'])->name('syaikhuna.admin');
    Route::get('/syaikhunaAdmin/create', [SyaikhunaController::class, 'create'])->name('syaikhuna.create');
    Route::post('/syaikhunaAdmin/store', [SyaikhunaController::class, 'store'])->name('syaikhuna.store');
    Route::get('/syaikhunaAdmin/edit/{id}', [SyaikhunaController::class, 'edit'])->name('syaikhuna.edit');
    Route::put('/syaikhunaAdmin/update/{id}', [SyaikhunaController::class, 'update'])->name('syaikhuna.update');
    Route::delete('/syaikhunaAdmin/delete/{id}', [SyaikhunaController::class, 'destroy'])->name('syaikhuna.destroy');
    Route::get('/biografiSyaikhunaAdmin', [BiografiSyaikhunaController::class, 'biografiSyaikhunaAdmin'])->name('biografi.syaikhuna.admin');
    Route::get('/biografiSyaikhunaAdmin/create', [BiografiSyaikhunaController::class, 'create'])->name('biografi.syaikhuna.create');
    Route::post('/biografiSyaikhunaAdmin/store', [BiografiSyaikhunaController::class, 'store'])->name('biografi.syaikhuna.store');
    Route::get('/biografiSyaikhunaAdmin/edit/{id}', [BiografiSyaikhunaController::class, 'edit'])->name('biografi.syaikhuna.edit');
    Route::put('/biografiSyaikhunaAdmin/update/{id}', [BiografiSyaikhunaController::class, 'update'])->name('biografi.syaikhuna.update');
    Route::delete('/biografiSyaikhunaAdmin/delete/{id}', [BiografiSyaikhunaController::class, 'destroy'])->name('biografi.syaikhuna.destroy');
    Route::get('/pendaftaranAdmin', [PendaftaranController::class, 'pendaftaranAdmin'])->name('pendaftaran.admin');
    Route::get('/pendaftaranAdmin/create', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaranAdmin/store', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaranAdmin/edit/{id}', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('/pendaftaranAdmin/update/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::delete('/pendaftaranAdmin/delete/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
    Route::get('/postAdmin', [PostController::class, 'postAdmin'])->name('post.admin');
    Route::get('/postAdmin/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/postAdmin/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/postAdmin/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/postAdmin/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/postAdmin/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/kontakAdmin', [KontakController::class, 'kontakAdmin'])->name('kontak.admin');
    Route::get('/kontakAdmin/create', [KontakController::class, 'create'])->name('kontak.create');
    Route::post('/kontakAdmin/store', [KontakController::class, 'store'])->name('kontak.store');
    Route::get('/kontakAdmin/edit/{id}', [KontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontakAdmin/update/{id}', [KontakController::class, 'update'])->name('kontak.update');
    Route::delete('/kontakAdmin/delete/{id}', [KontakController::class, 'destroy'])->name('kontak.destroy');
    Route::get('/slideAdmin', [SlideController::class, 'slideAdmin'])->name('slide.admin');
    Route::get('/slideAdmin/create', [SlideController::class, 'create'])->name('slide.create');
    Route::post('/slideAdmin/store', [SlideController::class, 'store'])->name('slide.store');
    Route::get('/slideAdmin/edit/{id}', [SlideController::class, 'edit'])->name('slide.edit');
    Route::put('/slideAdmin/update/{id}', [SlideController::class, 'update'])->name('slide.update');
    Route::delete('/slideAdmin/delete/{id}', [SlideController::class, 'destroy'])->name('slide.destroy');
    Route::get('/berandaAdmin', [BerandaController::class, 'berandaAdmin'])->name('beranda.admin');
    Route::get('/berandaAdmin/create', [BerandaController::class, 'create'])->name('beranda.create');
    Route::post('/berandaAdmin/store', [BerandaController::class, 'store'])->name('beranda.store');
    Route::get('/berandaAdmin/edit/{id}', [BerandaController::class, 'edit'])->name('beranda.edit');
    Route::put('/berandaAdmin/update/{id}', [BerandaController::class, 'update'])->name('beranda.update');
    Route::delete('/berandaAdmin/delete/{id}', [BerandaController::class, 'destroy'])->name('beranda.destroy');
});
