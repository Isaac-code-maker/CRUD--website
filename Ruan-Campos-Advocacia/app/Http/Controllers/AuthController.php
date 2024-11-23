<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Lógica para efetuar o login
    public function login(Request $request)
    {
        // Validação dos dados
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            // Regenera a sessão
            $request->session()->regenerate();

            // Redireciona para o painel administrativo
            return redirect()->intended('admin/dashboard');
        }

        // Retorna um erro se a autenticação falhar
        return back()->with('error', 'E-mail ou senha inválidos.');
    }

    // Lógica para efetuar logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalida a sessão do usuário
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

