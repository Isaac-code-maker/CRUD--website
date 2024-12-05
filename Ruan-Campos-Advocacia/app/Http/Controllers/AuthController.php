<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Credenciais fixas
    private $email = 'admin@exemplo.com'; // E-mail fixo para login
    private $password = 'senha123';      // Senha fixa para login

    // Exibe o formulário de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Valida os dados enviados
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Verifica se o e-mail e a senha correspondem aos valores fixos
        if ($credentials['email'] === $this->email && $credentials['password'] === $this->password) {
            // Autentica o usuário manualmente (ID fictício)
            Auth::loginUsingId(1); // Certifique-se de que o ID 1 está correto

            // Redireciona para o painel administrativo
            return redirect()->route('admin.dashboard');
        }

        // Retorna erro caso as credenciais sejam inválidas
        return back()->withInput($request->only('email'))->withErrors([
            'email' => 'E-mail ou senha inválidos.',
        ]);
    }


    // Lógica para efetuar logout
    public function logout(Request $request)
    {
        // Faz o logout do usuário
        Auth::logout();

        // Invalida a sessão e regenera o token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Você saiu com sucesso.');
    }
}
