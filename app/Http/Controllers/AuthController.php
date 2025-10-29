<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    
    public function showLoginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/reservas');
        }

        return back()->withErrors(['email' => 'Credenciais inválidas']);
    }

    public function logout(Request $request) {
        Auth::logout(); // Sai do usuário logado

        $request->session()->invalidate(); // Invalida a sessão atual
        $request->session()->regenerateToken(); // Regenera o token CSRF

        return redirect()->route('login'); // Redireciona pro login
    }

}
