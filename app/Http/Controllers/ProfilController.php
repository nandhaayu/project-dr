<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // function index() {
    //     $profil = Profil::all();
    //     return view 
    // }
    function profilAdmin () {
        $profil = Profil::all();
        return view('backend.profil.index', compact('profil'));
    }

    function create () {
        return view('backend.profil.create');
    }
    function edit () {
        return view('backend.profil.edit');
    }
}
