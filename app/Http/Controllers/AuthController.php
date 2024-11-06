<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function tampilRegistrasi() {
        return view('auth.registrasi');
    }

    public function submitRegistrasi(Request $request) {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        $user->save();
        return redirect()->route('login');
    }

    public function tampilLogin() {
        return view('auth.login');
    }
    public function submitLogin(Request $request) {
        $data = $request->only('email', 'password');

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('gagal', 'Email atau Password anda salah!');
        }
    }

    public function logout () {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
