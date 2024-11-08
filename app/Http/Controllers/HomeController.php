<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\Profil;
use App\Models\Rutinitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function profil () {
        $profil = Profil::all();
        return view('profil', compact('profil'));
    }
    public function kurikulum () {
        $kurikulum = Kurikulum::all();
        return view('kurikulum', compact('kurikulum'));
    }
    public function rutinitas () {
        $rutinitas = Rutinitas::all();
        return view('rutinitas', compact('rutinitas'));
    }
}
