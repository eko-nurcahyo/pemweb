<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['nim' => $request->nim, 'password' => $request->password])) {
            return redirect()->intended('/dashboard-mahasiswa');
        }

        return back()->withErrors([
            'login' => 'NIM atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
