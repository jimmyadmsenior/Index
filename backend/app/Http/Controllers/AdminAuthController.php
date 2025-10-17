<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrador;

class AdminAuthController extends Controller
{
    /**
     * Mostra o formulário de login do administrador
     */
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login');
    }

    /**
     * Processa o login do administrador
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Mapeia password para senha para compatibilidade com a estrutura do banco
        $loginCredentials = [
            'email' => $credentials['email'],
            'senha' => $credentials['password'],
        ];

        if (Auth::guard('admin')->attempt($loginCredentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Atualiza último acesso
            Auth::guard('admin')->user()->atualizarUltimoAcesso();
            
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não conferem com nossos registros.',
        ])->onlyInput('email');
    }

    /**
     * Logout do administrador
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    }

    /**
     * Mostra o formulário de primeiro acesso
     */
    public function showSetupForm()
    {
        // Verifica se já existem administradores
        if (Administrador::exists()) {
            return redirect()->route('admin.login');
        }
        
        return view('admin.setup');
    }

    /**
     * Cria os primeiros administradores
     */
    public function setup(Request $request)
    {
        // Verifica se já existem administradores
        if (Administrador::exists()) {
            return redirect()->route('admin.login');
        }

        $request->validate([
            'admin1_nome' => ['required', 'string', 'max:255'],
            'admin1_email' => ['required', 'string', 'email', 'max:255', 'unique:administradores,email'],
            'admin1_password' => ['required', 'string', 'min:8', 'confirmed'],
            'admin2_nome' => ['required', 'string', 'max:255'],
            'admin2_email' => ['required', 'string', 'email', 'max:255', 'unique:administradores,email'],
            'admin2_password' => ['required', 'string', 'min:8'],
        ]);

        // Cria o primeiro administrador (Master)
        Administrador::create([
            'nome' => $request->admin1_nome,
            'email' => $request->admin1_email,
            'password' => Hash::make($request->admin1_password),
            'nivel_acesso' => 'master',
            'ativo' => true,
            'email_verified_at' => now(),
        ]);

        // Cria o segundo administrador (Operador)
        Administrador::create([
            'nome' => $request->admin2_nome,
            'email' => $request->admin2_email,
            'password' => Hash::make($request->admin2_password),
            'nivel_acesso' => 'operador',
            'ativo' => true,
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.login')->with('success', 'Administradores criados com sucesso! Faça login para continuar.');
    }
}