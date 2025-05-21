<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Asumsi Anda memiliki file blade di resources/views/auth/login.blade.php
    }

    /**
     * Memproses data login dari form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            $request->session()->regenerate();

            // Redirect ke route dengan name 'dashboard'
            return redirect()->route('dashboard');
        }

        // Autentikasi gagal
        return Redirect::back()->withErrors(['email' => 'Kredensial tidak valid.']);
    }

    /**
     * Logout pengguna.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}
