<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RutinitasController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


//ROUTE FRONTEND

Route::get('/', function () {
    return view('home', ['title' => 'Beranda']);
});

Route::get('/profil',[HomeController::class, 'profil'])->name('profil');
Route::get('/kurikulum',[HomeController::class, 'kurikulum'])->name('kurikulum');
Route::get('/rutinitas',[HomeController::class, 'rutinitas'])->name('rutinitas');

Route::get('/syaikhuna', function () {
    return view('syaikhuna', ['title' => 'Halaman Syaikhuna']);
});

Route::get('/pendaftaran', function () {
    return view('pendaftaran', ['title' => 'Halaman Pendaftaran']);
});

Route::get('/galeri', function () {
    return view('galeri', ['title' => 'Halaman Galeri', 'posts' => Post::all()]);
});

// Route::get('/posts/{slug}', function ($slug) {

//     $post = Post::find($slug);
    
//     return view('galeriSingle', ['title' => 'Single Post', 'post' => $post]);
// });

Route::get('/posts/{post:slug}', function (Post $post) {
    
    return view('galeriSingle', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    
    return view('galeri', ['title' => count($user->posts) . ' Artikel by ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/kontak', function () {
    return view('kontak', ['title' => 'Halaman Kontak']);
});

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
});
