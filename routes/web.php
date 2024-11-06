<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


//ROUTE FRONTEND

Route::get('/', function () {
    return view('home', ['title' => 'Beranda']);
});

Route::get('/kami', function () {
    return view('kami', ['title' => 'Halaman Kami']);
});

Route::get('/profil', function () {
    return view('profil', ['title' => 'Profil']);
});

Route::get('/kurikulum', function () {
    return view('kurikulum', ['title' => 'Kurikulum']);
});

Route::get('/rutinitas', function () {
    return view('rutinitas', ['title' => 'Jadwal Kegiatan']);
});

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

    // $post = Post::find($slug);
    
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

});
