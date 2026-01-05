<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Girş Yap Ekranı
    public function showLoginForm()
    {
        return view('login');
    }
    // Giriş Yap İşlemi
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt(
            ['email' => $request->email, 'password' => $request->password],
            $remember
        )) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'E-posta veya şifre hatalı',
        ])->withInput();
    }
    // Güvenli Çıkış
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
