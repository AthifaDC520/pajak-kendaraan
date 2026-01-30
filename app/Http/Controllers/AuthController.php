<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // tampilkan form login
    public function login()
    {
        return view('auth.login');
    }

    // proses login
   public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'name' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/'); // BALIK KE DASHBOARD
    }

    return back()->withErrors([
        'login' => 'Nama atau password salah',
    ]);
}


    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
