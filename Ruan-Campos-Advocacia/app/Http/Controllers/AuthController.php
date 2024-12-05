<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            /*
             * Author: Samuel Milhomens
             * Description: O redirecionamento não estava ocorrendo pelo fato do do Auth::login precisar
             * de usuario do Model User. Então o middleware não ia aceitar a autenticação feita
             * anteriomente.
             * 
             * TODO: Pegar usuário dinamicamentepelo id, como no exemplo: https://github.com/Samuel-Mil/gestao-financeira-laravel
             * Esse app acima é uma aplicacão laravel que fiz que segue uma regra de login parecida
            */
            $user = User::where("id", 1)->first();
            Auth::login($user);
            
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
